<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemBimbel;
use App\Models\ItemBook;
use App\Models\ItemLayanan;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ItemSeminar;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // Hitung total seminar
        $totalSeminars = ItemSeminar::count();

        // Hitung total layanan
        $totalLayanan = ItemLayanan::count();

        // Hitung total bimbe
        $totalBimbel = ItemBimbel::count();
        
        // Hitung total buku
        $totalBook = ItemBook::count();
        // Hitung total pesanan hari ini (jumlah order, bukan harga)
        $todayOrders = Order::whereDate('created_at', Carbon::today())->count();

        // Hitung total pesanan (semua order)
        $totalOrders = Order::count();

        // Hitung total pendapatan (anggap ada kolom total_harga di tabel orders)
        // $totalRevenue = Order::sum('total_harga');

        return view('admin.index', compact(
            'totalSeminars',
            'todayOrders',
            'totalOrders',
            'totalLayanan',
            'totalBimbel',
            'totalBook',
            // 'totalRevenue'
        ));
    }
}
