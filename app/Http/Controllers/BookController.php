<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;

class BookController extends Controller
{
    public function index()
    {
        $items = Item::with('category')
            ->where('is_active', 1)
            ->whereHas('category', function ($q) {
                $q->where('cat_name', 'Book');
            })
            ->orderBy('name', 'asc')
            ->get();

        return view('product.book', compact('items'));
    }

    public function cart()
    {
        $cart = Session::get('cart');
        return view('product.cart', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        $menuId = $request->input('id');
        $menu = Item::find($menuId);

        if (!$menu) {
            return response()->json([
                'status' => 'error',
                'message' => 'Menu tidak ditemukan'
            ]);
        }

        $cart = Session::get('cart', []);

        // Cek apakah item sudah ada di cart
        if (isset($cart[$menuId])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item sudah ada di keranjang',
                'cart' => $cart
            ]);
        }

        // Kalau belum ada, tambahkan dengan qty = 1
        $cart[$menuId] = [
            'id' => $menu->id,
            'name' => $menu->name,
            'price' => $menu->price,
            'image' => $menu->img,
            'qty' => 1
        ];

        Session::put('cart', $cart);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil ditambahkan ke keranjang',
            'cart' => $cart
        ]);

    }

    public function updateCart(Request $request)
    {
        $itemId = $request->input('id');
        $newQty = $request->input('qty');

        if ($newQty <= 0) {
            return response()->json(['success' => false]);
        }

        $cart = Session::get('cart');
        if (isset($cart[$itemId])) {
            $cart[$itemId]['qty'] = $newQty;
            Session::put('cart', $cart);
            Session::flash('success', 'Jumlah item berhasil diperbarui');

            return response()->json([ 'success' => true]);
        }

        return response()->json(['success' => false]);
    }

     public function removeCart(Request $request) {
        $itemId = $request->input('id');

        $cart = Session::get('cart');

        if (isset($cart[$itemId])) {
            unset($cart[$itemId]);
            Session::put('cart', $cart);

            Session::flash('success', 'Item berhasil dihapus dari keranjang');

            return response()->json(['success' => true]);
        }
    }


    public function clearCart()
    {
        Session::forget('cart');
        return redirect()->route('cart')->with('success', 'Keranjang berhasil dikosongkan');
    }

    public function checkout()
    {
        $cart = Session::get('cart');
        if(empty($cart)) {
            return redirect()->route('cart')->with('error', 'Keranjang masih kosong');
        }

        // $tableNumber = Session::get('tableNumber');

        return view('product.checkout', compact('cart'));
    }

    private function generateOrderCode()
    {
        do {
            $code = 'ORD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
        } while (Order::where('order_code', $code)->exists());
        
        return $code;
    }

    public function storeOrder(Request $request)
    {
        $cart = Session::get('cart');

        if(empty($cart)) {
            return redirect()->route('cart')->with('error', 'Keranjang masih kosong');
        }

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
        ]);
        if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'errors' => $validator->errors()
        ], 422); // kode HTTP 422 untuk validasi gagal
    }

        if ($validator->fails()) {
            return redirect()->route('checkout')->withErrors($validator);
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['qty'] * $item['price'];

            $itemDetails[] = [
                'id' => $item['id'],
                'price' => (int) ($item['price'] + ($item['price'] * 0.1)),
                'quantity' => $item['qty'],
                'name' => substr($item['name'], 0, 50),
            ];
        }

        $order = Order::create([
            'order_code' => $this->generateOrderCode(),
            'user_id' => Auth::id(),
            'fullname' => $request->input('fullname'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'subtotal' => $totalAmount,
            'tax' => 0.1 * $totalAmount,
            'grand_total' => $totalAmount + (0.1 * $totalAmount),
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'note' => $request->note,
        ]);

        foreach ($cart as $itemId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $item['id'],
                'quantity' => $item['qty'],
                'price' => $item['price'] * $item['qty'],
                'tax' => 0.1 * $item['price'] * $item['qty'],
                'total_price' => ($item['price'] * $item['qty']) + (0.1 * $item['price'] * $item['qty']),
            ]);
        }

        Session::forget('cart');

        if($request->payment_method == 'tunai') {
            return redirect()->route('checkout.success', ['orderId' => $order->order_code])->with('success', 'Pesanan berhasil dibuat');
        } else {
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;    

            $params = [
                    'transaction_details' => [
                        'order_id' => $order->order_code,
                        'gross_amount' =>  (int) $order->grand_total,
                ],
                    'item_details' => $itemDetails,
                    'customer_details' => [
                        'first_name' => $order->fullname ?? 'Guest',
                        'phone' => $order->phone,
                        'email' => $order->email,
                ],
                    'payment_type' => 'qris',
            ];

            try {
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                return response()->json([
                    'status' => 'success',
                    'snap_token' => $snapToken,
                    'order_code' => $order->order_code,
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gagal membuat pesanan. Silakan coba lagi.'
                ]);
            }
        }
    }

    public function checkoutSuccess($orderId)
    {
        $order = Order::where('order_code', $orderId)->first();

        if (!$order) {
            // return redirect()->route('book')->with('error', 'Pesanan tidak ditemukan');
            return response()->view('errors.order-not-found', [], 404);
        }

        $orderItems = OrderItem::where('order_id', $order->id)->get();

        if ($order->payment_method == 'qris') {
            $order->status  = 'settlement';
            $order->save();
        }

        return view('product.success', compact('order', 'orderItems'));

    }

    public function clear()
{
    Session::forget('cart');
    return response()->json(['status' => 'ok']);
}


public function handleNotification()
{
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    \Midtrans\Config::$isProduction = config('midtrans.is_production');
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    $notif = new \Midtrans\Notification();

    $transactionStatus = $notif->transaction_status;
    $orderId = $notif->order_id;
    $fraudStatus = $notif->fraud_status;

    $order = Order::where('order_code', $orderId)->first();

    if (!$order) {
        return response()->json(['message' => 'Order tidak ditemukan'], 404);
    }

    if ($transactionStatus == 'capture') {
        if ($fraudStatus == 'challenge') {
            $order->status = 'challenge';
        } else {
            $order->status = 'settlement';
        }
    } else if ($transactionStatus == 'settlement') {
        $order->status = 'success';
    } else if ($transactionStatus == 'pending') {
        $order->status = 'pending';
    } else if ($transactionStatus == 'deny') {
        $order->status = 'denied';
    } else if ($transactionStatus == 'expire') {
        $order->status = 'expired';
    } else if ($transactionStatus == 'cancel') {
        $order->status = 'canceled';
    }

    $order->save();

    return response()->json(['message' => 'Notifikasi diproses']);
}



    
}
