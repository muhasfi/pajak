<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return view('admin.index');
    // }
    public function index()
    {
        // === Statistik Umum ===
        $totalOrders = Order::where('status', 'success')->count();
        $totalItems = OrderItem::whereHas('order', function ($q) {
            $q->where('status', 'success');
        })->sum('quantity');
        $totalRevenue = Order::where('status', 'success')->sum('grand_total');
        $todayOrders = Order::where('status', 'success')
            ->whereDate('created_at', today())
            ->sum('grand_total');
        $today = Order::where('status', 'success')
            ->whereDate('created_at', today())
            ->count();

        // === Penjualan Per Bulan (Tahun Berjalan) ===
        $monthlySales = Order::selectRaw('MONTH(created_at) as month, SUM(grand_total) as total')
            ->where('status', 'success')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Biar data selalu 12 bulan (kalau ada bulan kosong tetap 0)
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[$i] = $monthlySales[$i] ?? 0;
        }

        // === Total Penjualan per Tahun ===
        $yearlySales = Order::selectRaw('YEAR(created_at) as year, SUM(grand_total) as total')
            ->where('status', 'success')
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('total', 'year')
            ->toArray();

        return view('admin.index', compact(
            'totalOrders',
            'totalItems',
            'totalRevenue',
            'todayOrders',
            'today',
            'months',
            'yearlySales'
        ));
    }


    public function profile()
    {
        return view('admin.profile');
    }
}
