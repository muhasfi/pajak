<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrevetAB;
use App\Models\BrevetC;
use App\Models\InHouseTraining;
use App\Models\ItemBimbel;
use App\Models\ItemBook;
use App\Models\ItemLayanan;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ItemSeminar;
use App\Models\Training;
use App\Models\Webinar;
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
        // $totalBimbel = ItemBimbel::count();
        
        // Hitung total buku
        // $totalBook = ItemBook::count();
        // Hitung total buku
        $totalBrevetAB = BrevetAB::count();
        // Hitung total buku
        $totalBrevetC = BrevetC::count();
        // Hitung total Webinar
        $totalwebinar = Webinar::count();
            // Hitung total buku
        $totalTraining = Training::count();
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
            // 'totalBimbel',
            // 'totalBook',
            'totalBrevetAB',
            'totalBrevetC',
            'totalwebinar',
            'totalTraining',
            // 'totalInHouseTraining',
            // 'totalRevenue'
        ));
    }
}
