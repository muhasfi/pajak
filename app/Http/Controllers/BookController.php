<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;

class BookController extends Controller
{
    public function index()
    {
        $items = Item::where('is_active', 1)
            ->orderBy('name', 'asc')
            ->paginate(10);

        return view('product.book.book', compact('items'));
    }

    // public function cart()
    // {
    //     $cart = Session::get('cart');
    //     return view('product.book.cart', compact('cart'));
    // }

    // public function addToCart(Request $request)
    // {
    //     $menuId = $request->input('id');
    //     $menu = Item::find($menuId);

    //     if (!$menu) {
    //         return response()->json([
    //             'status'    => 'error',
    //             'message'   => 'Menu tidak ditemukan'
    //         ]);
    //     }

    //     $cart = Session::get('cart', []);

    //     // Cek apakah item sudah ada di cart
    //     if (isset($cart[$menuId])) {
    //         return response()->json([
    //             'status'    => 'error',
    //             'message'   => 'Item sudah ada di keranjang',
    //             'cart'      => $cart
    //         ]);
    //     }

    //     // Kalau belum ada, tambahkan dengan qty = 1
    //     $cart[$menuId] = [
    //         'id'    => $menu->id,
    //         'name'  => $menu->name,
    //         'price' => $menu->price,
    //         'image' => $menu->img,
    //         'qty'   => 1
    //     ];

    //     Session::put('cart', $cart);

    //     return response()->json([
    //         'status'    => 'success',
    //         'message'   => 'Berhasil ditambahkan ke keranjang',
    //         'cart'      => $cart
    //     ]);

    // }
    public function show($id)
    {
        $item = Item::with('reviews')->findOrFail($id);
        $relatedItems = Item::where('id', '!=', $id)
            ->inRandomOrder()
            ->limit(4)
            ->get();
        
        return view('catalog.show', compact('item', 'relatedItems'));
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

    //  public function removeCart(Request $request) {
    //     $itemId = $request->input('id');

    //     $cart = Session::get('cart');

    //     if (isset($cart[$itemId])) {
    //         unset($cart[$itemId]);
    //         Session::put('cart', $cart);
    //         Session::flash('success', 'Item berhasil dihapus dari keranjang');
    //         return response()->json(['success' => true]);
    //     }
    // }


    // public function clearCart()
    // {
    //     Session::forget('cart');
    //     return redirect()->route('cart')->with('success', 'Keranjang berhasil dikosongkan');
    // }

    // public function checkout()
    // {
    //     $cart = Session::get('cart');
    //     if(empty($cart)) {
    //         return redirect()->route('cart')->with('error', 'Keranjang masih kosong');
    //     }

    //     return view('product.book.checkout', compact('cart'));
    // }

    // private function generateOrderCode()
    // {
    //     do {
    //         $code = 'ORD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
    //     } while (Order::where('order_code', $code)->exists());
        
    //     return $code;
    // }

    // public function storeOrder(Request $request)
    // {
    //     $cart = Session::get('cart');

    //     if (empty($cart)) {
    //         return redirect()->route('cart')->with('error', 'Keranjang masih kosong');
    //     }

    //     // Validasi
    //     $validator = Validator::make($request->all(), [
    //         'fullname' => 'required|string|max:255',
    //         'phone'    => 'required|string|max:15',
    //         'email'    => 'required|email|max:255',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 'error',
    //             'errors' => $validator->errors()
    //         ], 422);
    //     }

    //     // Hitung total
    //     $totalAmount = 0;
    //     $itemDetails = [];

    //     foreach ($cart as $item) {
    //         $totalAmount += $item['qty'] * $item['price'];

    //         $itemDetails[] = [
    //             'id'       => $item['id'],
    //             'price'    => (int) ($item['price'] + ($item['price'] * 0.1)), // +10% PPN
    //             'quantity' => $item['qty'],
    //             'name'     => substr($item['name'], 0, 50),
    //         ];
    //     }

    //     // Simpan order
    //     $order = Order::create([
    //         'order_code'     => $this->generateOrderCode(),
    //         'user_id'        => Auth::id(),
    //         'fullname'       => $request->fullname,
    //         'phone'          => $request->phone,
    //         'email'          => $request->email,
    //         'subtotal'       => $totalAmount,
    //         'tax'            => 0.1 * $totalAmount,
    //         'grand_total'    => $totalAmount + (0.1 * $totalAmount),
    //         'status'         => 'pending',
    //         'payment_method' => 'midtrans',   // selalu midtrans
    //         'note'           => $request->note,
    //     ]);

    //     // Simpan order item
    //     foreach ($cart as $item) {
    //         OrderItem::create([
    //             'order_id'    => $order->id,
    //             'item_id'     => $item['id'],
    //             'quantity'    => $item['qty'],
    //             'price'       => $item['price'] * $item['qty'],
    //             'tax'         => 0.1 * $item['price'] * $item['qty'],
    //             'total_price' => ($item['price'] * $item['qty']) + (0.1 * $item['price'] * $item['qty']),
    //         ]);
    //     }

    //     // Hapus cart session
    //     Session::forget('cart');

    //     // Konfigurasi Midtrans
    //     \Midtrans\Config::$serverKey    = config('midtrans.server_key');
    //     \Midtrans\Config::$isProduction = config('midtrans.is_production');
    //     \Midtrans\Config::$isSanitized  = true;
    //     \Midtrans\Config::$is3ds        = true;

    //     // Parameter Snap
    //     $params = [
    //         'transaction_details' => [
    //             'order_id'     => $order->order_code,
    //             'gross_amount' => (int) $order->grand_total,
    //         ],
    //         'item_details' => $itemDetails,
    //         'customer_details'  => [
    //             'first_name'    => $order->fullname ?? 'Guest',
    //             'phone'         => $order->phone,
    //             'email'         => $order->email,
    //         ],
    //     ];

    //     try {
    //         $snapToken = \Midtrans\Snap::getSnapToken($params);
    //         $order->update([
    //         'snap_token' => $snapToken
    //     ]);

    //         return response()->json([
    //             'status'     => 'success',
    //             'snap_token' => $snapToken,
    //             'order_code' => $order->order_code,
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status'  => 'error',
    //             'message' => 'Gagal membuat pesanan. Silakan coba lagi.',
    //             'error'   => $e->getMessage(),
    //         ], 500);
    //     }
    // }

    // public function orderPay($orderCode)
    // {
    //     $order = Order::where('order_code', $orderCode)->firstOrFail();

    //     // Konfigurasi Midtrans
    //     \Midtrans\Config::$serverKey    = config('midtrans.server_key');
    //     \Midtrans\Config::$isProduction = config('midtrans.is_production');
    //     \Midtrans\Config::$isSanitized  = true;
    //     \Midtrans\Config::$is3ds        = true;

    //     // Kalau belum ada snap_token → buat
    //     if (!$order->snap_token) {
    //         $params = [
    //             'transaction_details' => [
    //                 'order_id'     => $order->order_code,
    //                 'gross_amount' => (int) $order->grand_total,
    //             ],
    //             'customer_details' => [
    //                 'first_name' => $order->fullname,
    //                 'phone'      => $order->phone,
    //                 'email'      => $order->email,
    //             ],
    //             'callbacks' => [
    //                 'finish' => route('product.book.success', $order->order_code),
    //             ],
    //         ];

    //         $snapToken = \Midtrans\Snap::getSnapToken($params);
    //         $order->update(['snap_token' => $snapToken]);
    //     }

    //     if ($order->status !== 'pending') {
    //     return redirect()->route('checkout.success', $order->order_code);
    // }

    //     return view('product.book.order_pay', compact('order'));
    // }

    // public function checkoutSuccess($orderId)
    // {
    //     $order = Order::where('order_code', $orderId)->first();

    //     if (!$order) {
    //         return response()->view('errors.order-not-found', [], 404);
    //     }
    //     $orderItems = OrderItem::where('order_id', $order->id)->get();
        
    //     return view('product.book.success', compact('order', 'orderItems'));
    // }

    // public function handleNotification()
    // {
    //         \Midtrans\Config::$serverKey = config('midtrans.server_key');
    //         \Midtrans\Config::$isProduction = config('midtrans.is_production');
    //         \Midtrans\Config::$isSanitized = true;
    //         \Midtrans\Config::$is3ds = true;

    //         $notif = new \Midtrans\Notification();

    //         $transactionStatus  = $notif->transaction_status;
    //         $orderId            = $notif->order_id;
    //         $fraudStatus        = $notif->fraud_status;
    //         $paymentType        = $notif->payment_type;

    //         $order = Order::where('order_code', $orderId)->first();

    //         if (!$order) {
    //             return response()->json(['message' => 'Order tidak ditemukan'], 404);
    //         }
    //         $order->payment_method = $paymentType;

    //         if ($transactionStatus == 'capture') {
    //             if ($fraudStatus == 'challenge') {
    //                 $order->status = 'challenge';
    //             } else {
    //                 $order->status = 'success';
                    
    //             }
    //         } else if ($transactionStatus == 'settlement') {
    //             $order->status = 'success';
    //         } else if ($transactionStatus == 'pending') {
    //             $order->status = 'pending';
    //         } else if ($transactionStatus == 'deny') {
    //             $order->status = 'denied';
    //         } else if ($transactionStatus == 'expire') {
    //             $order->status = 'expired';
    //         } else if ($transactionStatus == 'cancel') {
    //             $order->status = 'canceled';
    //         }

    //         $order->save();

    //         if ($order->status === 'success') {
    //         try {
    //             Mail::to($order->email)->send(new \App\Mail\OrderPaidMail($order));
    //         } catch (\Exception $e) {
    //             Log::error("Gagal kirim email ke {$order->email}: " . $e->getMessage());
    //         }
    //     }

    //         return response()->json(['message' => 'Notifikasi diproses']);
    // }


    
}
