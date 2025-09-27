<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function book()
    {
        return view('product.book');
    }

    public function profile()
    {
        return view('profile');
    }

     public function transaction()
    {
        // Ambil semua order user login + detail produk
        $orders = Order::with(['orderItems.product'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
        // dd($orders);

        return view('transactions.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['orderItems.product'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('transactions.show', compact('order'));
    }
}
