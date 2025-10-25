<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class BookController extends Controller
{
    public function index()
    {
        $items = Item::where('is_active', 1)
            ->orderBy('name', 'asc')
            ->paginate(10);

        return view('product.book.book', compact('items'));
    }

<<<<<<< HEAD
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
=======
    public function show($id)
>>>>>>> 0f935732cb88fa8dd06facf269357e61c0ffc923
    {
        $item = Item::with('detail')->findOrFail($id);

        return view('product.book.show', compact('item'));
    }
    
}
