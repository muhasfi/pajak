<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function cart()
    {
        $cart = Session::get('cart');
        return view('product.checkout.cart', compact('cart'));
    }
    public function addToCart(Request $request)
    {
        $productType = $request->input('type');
        $productId   = $request->input('id');

        if ($productType === 'ItemBimbel' && !auth()->check()) {
        return response()->json(['status' => 'error', 'message' => 'Silakan login untuk membeli bimbel']);
        }

        if ($productType === 'ItemBimbel' && auth()->check()) {
            $existing = OrderItem::where('product_id', $productId)
                ->where('product_type', 'bimbel')
                ->whereHas('order', function($q) {
                    $q->where('user_id', auth()->id())
                    ->where('status', 'success');
                })
                ->where('start_date', '<=', now())
                ->where('end_date', '>=', now())
                ->first();

            if ($existing) {
                $now = now();
                if ($existing->start_date <= $now && $existing->end_date >= $now) {
                    return response()->json([
                        'status'  => 'redirect',
                        'url'     => route('bimbel.show', $existing->id),
                        'message' => 'Kamu sudah membeli bimbel ini, langsung diarahkan ke halaman bimbel.'
                    ]);
                }
            }
        }


        $modelClass = "\\App\\Models\\{$productType}";
        if (!class_exists($modelClass)) {
            return response()->json(['status' => 'error', 'message' => 'Tipe produk tidak valid']);
        }

        $product = $modelClass::find($productId);
        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Produk tidak ditemukan']);
        }

        $cart = Session::get('cart', []);
        $key = $productType . '-' . $productId;

        if (isset($cart[$key])) {
            return response()->json(['status' => 'error', 'message' => 'Produk sudah ada di keranjang']);
        }

        $morphType = match ($productType) {
            'Item'          => 'item',
            'ItemBimbel'    => 'bimbel',
            'ItemPaper'     => 'paper',
            'ItemBrevetAB'  => 'brevetab',
            'ItemBrevetC'   => 'brevetc',
            'ItemWebinar'   => 'webinar',
            'ItemSeminar'   => 'seminar',
            'ItemTraining'  => 'training',
            'ItemAccountingService' => 'accountingservice',
            'ItemLayananPt' => 'itemlayananpt',
            'ItemPajak'     => 'itempajak',
            'ItemLitigasi'  => 'itemlitagasi',
            'ItemAudit'     => 'itemaudit',
            'ItemTransfer'  => 'itemtransfer',
            'ItemKonsultasi'  => 'itemkonsultasi',
            default         => strtolower($productType), // fallback
        };

        $cart[$key] = [
            'id'    => $productId,
            'type'  => $morphType,
            'image' => $product->img ?? $product->gambar ?? 'default.jpg', 
            'name'  => $product->name ?? $product->judul, // Book pakai "name", Bimbel pakai "judul"
            'price' => $product->price ?? $product->harga,
            // 'paper_type' => $morphType === 'paper' ? strtolower(optional($product->categoryPaper)->name) : null,
            'qty'   => 1,
        ];

        Session::put('cart', $cart);

        return response()->json(['status' => 'success', 'message' => 'Produk ditambahkan', 'cart' => $cart]);
    }
    

    public function removeCart(Request $request)
    {
        $morphType = $request->input('type'); // 'item' atau 'bimbel'
        $productId = $request->input('id');

        // Validasi input
        if (!$morphType || !$productId) {
            return response()->json([
                'status' => 'error', 
                'message' => 'Data tidak lengkap'
            ]);
        }

        $cart = Session::get('cart', []);
        
        // Konversi morph type ke model class untuk key
        $productType = match ($morphType) {
            'item'       => 'Item',
            'bimbel'     => 'ItemBimbel',
            'paper'      => 'ItemPaper',
            'brevetab'   => 'ItemBrevetAB',
            'brevetc'    => 'ItemBrevetC',
            'webinar'    => 'ItemWebinar',
            'seminar'    => 'ItemSeminar',
            'training'   => 'ItemTraining',
            'accountingservice' => 'ItemAccountingService',
            'itemlayananpt' => 'ItemLayananPt',
            'itempajak'     => 'ItemPajak',
            'itemlitagasi'  => 'ItemLitigasi',
            'itemaudit'     => 'ItemAudit',
            'itemtransfer'  => 'ItemTransfer',
            'itemkonsultasi'  => 'ItemKonsultasi',
            default         => ucfirst($morphType),
        };
        
        $key = $productType . '-' . $productId;

        // Cek apakah produk ada di keranjang
        if (!isset($cart[$key])) {
            return response()->json([
                'status' => 'error', 
                'message' => 'Produk tidak ada di keranjang'
            ]);
        }

        // Hapus produk dari keranjang
        unset($cart[$key]);
        Session::put('cart', $cart);

        return response()->json([
            'success' => true, 
            'message' => 'Produk dihapus dari keranjang',
            'cart' => $cart,
            'total_items' => count($cart)
        ]);
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

        return view('product.checkout.checkout', compact('cart'));
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

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Keranjang masih kosong');
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'phone'    => 'required|string|max:15',
            'email'    => 'required|email|max:255',
            'note'     => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Hitung total
        $subtotal = 0;
        $itemDetails = [];

        foreach ($cart as $item) {
            $subtotal += $item['qty'] * $item['price'];

            $itemDetails[] = [
                'id'       => $item['id'],
                'price'    => (int) ($item['price'] + ($item['price'] * 0.1)), // +10% PPN
                'quantity' => $item['qty'],
                'name'     => substr($item['name'], 0, 50),
            ];
        }

        $tax        = 0.1 * $subtotal;
        $grandTotal = $subtotal + $tax;

        // Simpan order
        $order = Order::create([
            'order_code'     => $this->generateOrderCode(),
            'user_id'        => Auth::id(),
            'fullname'       => $request->fullname,
            'phone'          => $request->phone,
            'email'          => $request->email,
            'subtotal'       => $subtotal,
            'tax'            => $tax,
            'grand_total'    => $grandTotal,
            'status'         => 'pending',
            'payment_method' => 'midtrans',
            'note'           => $request->note,
        ]);

        // Simpan detail item
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id'    => $order->id,
                'product_id'   => $item['id'],     // ambil id produk
                'product_type' => strtolower($item['type']) ,
                'quantity'    => $item['qty'],
                'price'       => $item['price'] * $item['qty'],
                'tax'         => 0.1 * $item['price'] * $item['qty'],
                'total_price' => ($item['price'] * $item['qty']) + (0.1 * $item['price'] * $item['qty']),

                'start_date'   => $item['type'] === 'bimbel' ? now() : null,
                // 'end_date'     => $item['type'] === 'bimbel' ? now()->addDays(30) : null,
                'end_date' => $item['type'] === 'bimbel' ? now()->addMinutes(6) : null,

                // 'type_paper'   => $item['type'] === 'paper' ? $item['paper_type'] : null

            ]);
        }

        // Kosongkan cart
        Session::forget('cart');

        // Midtrans config
        \Midtrans\Config::$serverKey    = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized  = true;
        \Midtrans\Config::$is3ds        = true;

        // Snap params
        $params = [
            'transaction_details' => [
                'order_id'     => $order->order_code,
                'gross_amount' => (int) $grandTotal,
            ],
            'item_details' => $itemDetails,
            'customer_details'  => [
                'first_name' => $order->fullname ?? 'Guest',
                'phone'      => $order->phone,
                'email'      => $order->email,
            ],
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $order->update([
                'snap_token' => $snapToken
            ]);

            return response()->json([
                'status'     => 'success',
                'snap_token' => $snapToken,
                'order_code' => $order->order_code,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Gagal membuat pesanan',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function orderPay($orderCode)
    {
        $order = Order::where('order_code', $orderCode)->firstOrFail();

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey    = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized  = true;
        \Midtrans\Config::$is3ds        = true;

        // Kalau belum ada snap_token → buat
        if (!$order->snap_token) {
            $params = [
                'transaction_details' => [
                    'order_id'     => $order->order_code,
                    'gross_amount' => (int) $order->grand_total,
                ],
                'customer_details' => [
                    'first_name' => $order->fullname,
                    'phone'      => $order->phone,
                    'email'      => $order->email,
                ],
                'callbacks' => [
                    'finish' => route('product.checkout.success', $order->order_code),
                ],
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $order->update(['snap_token' => $snapToken]);
        }

        if ($order->status !== 'pending') {
        return redirect()->route('checkout.success', $order->order_code);
    }

        return view('product.checkout.order_pay', compact('order'));
    }

    public function checkoutSuccess($orderId)
    {
        $order = Order::where('order_code', $orderId)->first();

        if (!$order) {
            return response()->view('errors.order-not-found', [], 404);
        }
        $orderItems = OrderItem::where('order_id', $order->id)->get();
        
        return view('product.checkout.success', compact('order', 'orderItems'));
    }

    public function handleNotification()
    {
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $notif = new \Midtrans\Notification();

            $transactionStatus  = $notif->transaction_status;
            $orderId            = $notif->order_id;
            $fraudStatus        = $notif->fraud_status;
            $paymentType        = $notif->payment_type;

            $order = Order::where('order_code', $orderId)->first();

            if (!$order) {
                return response()->json(['message' => 'Order tidak ditemukan'], 404);
            }
            $order->payment_method = $paymentType;

            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'challenge') {
                    $order->status = 'challenge';
                } else {
                    $order->status = 'success';
                    
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

            if ($order->status === 'success') {
            try {
                Mail::to($order->email)->send(new \App\Mail\OrderPaidMail($order));
            } catch (\Exception $e) {
                Log::error("Gagal kirim email ke {$order->email}: " . $e->getMessage());
            }
        }

            return response()->json(['message' => 'Notifikasi diproses']);
    }
}
