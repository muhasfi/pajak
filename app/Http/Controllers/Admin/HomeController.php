<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return view('admin.index');
    // }
    public function index()
    {
        // Total semua pesanan sukses
        $totalOrders = \App\Models\Order::where('status', 'success')->count();

        // Total item terjual dari order sukses
        $totalItems = \App\Models\OrderItem::whereHas('order', function ($q) {
            $q->where('status', 'success');
        })->sum('quantity');

        // Total pendapatan dari order sukses
        $totalRevenue = \App\Models\Order::where('status', 'success')->sum('grand_total');

        // Total pesanan hari ini (hanya sukses)
        $todayOrders = \App\Models\Order::where('status', 'success')
            ->whereDate('created_at', today())
            ->sum('grand_total');

        $today = \App\Models\Order::where('status', 'success')
            ->whereDate('created_at', today())
            ->count();

        return view('admin.index', compact(
            'totalOrders',
            'totalItems',
            'totalRevenue',
            'todayOrders',
            'today'
        ));
    }


    public function profile()
    {
        return view('admin.profile');
    }
}
