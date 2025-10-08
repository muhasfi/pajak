<?php

namespace App\Http\Controllers;

use App\Models\ItemBimbel;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class BimbelController extends Controller
{
    // Halaman utama e-learning / bimbel
    public function index()
    {
        $categories = [];
        $courses = [];
        $bimbels = ItemBimbel::with('details')->where('is_active', 1)->get();
        return view('product.bimbel.bimbel', compact('bimbels', 'categories', 'courses'));
    }

    public function list()
    {
        $myBimbels = OrderItem::with('product', 'order')
            ->whereHas('order', function ($q) {
                $q->where('user_id', auth()->id())
                ->where('status', 'success');   
            })
            ->where('product_type', 'bimbel') // karena pakai morphMap
            ->get();


        return view('product.bimbel.bimbel-list', compact('myBimbels'));
    }

    // Halaman detail kursus
    // public function show($id)
    // {
    //     $orderItem = OrderItem::with(['product.details', 'order'])
    //         ->whereHas('order', function ($q) {
    //             $q->where('user_id', auth()->id())
    //             ->where('status', 'success');
    //         })
    //         ->findOrFail($id);

    //         if (now()->gte($orderItem->end_date)) {
    //         return redirect()->route('bimbel.list')
    //             ->with('error', 'Masa aktif bimbel ini sudah habis.');
    //     }

    //     $bimbel = $orderItem->product;

    //     return view('product.bimbel.show', compact('bimbel', 'orderItem'));
    // }

    // public function show($id)
    // {
    //     $orderItem = OrderItem::with(['product.details', 'order'])
    //         ->whereHas('order', function ($q) {
    //             $q->where('user_id', auth()->id())
    //             ->where('status', 'success');
    //         })
    //         ->findOrFail($id);

    //     // Cek kalau ada masa aktif
    //     if ($orderItem->end_date && now()->gte($orderItem->end_date)) {
    //         return redirect()->route('bimbel.list')
    //             ->with('error', 'Masa aktif bimbel ini sudah habis.');
    //     }

    //     $bimbel = $orderItem->product;

    //     // Hitung sisa waktu (hari, jam, menit, detik)
    //     $sisaWaktu = null;
    //     if ($orderItem->end_date) {
    //         $sisaWaktu = now()->diff($orderItem->end_date)->format('%d hari %H jam %I menit %S detik');
    //     }

    //     return view('product.bimbel.show', compact('bimbel', 'orderItem', 'sisaWaktu'));
    // }

    public function show($id)
{
    $orderItem = OrderItem::with(['product.details', 'order'])
        ->whereHas('order', function ($q) {
            $q->where('user_id', auth()->id())
              ->where('status', 'success');
        })
        ->findOrFail($id);

    dd([
        'app_timezone' => config('app.timezone'),
        'now' => now(),
        'end_date' => $orderItem->end_date,
    ]);

    // Cek kalau ada masa aktif
    if ($orderItem->end_date && now()->gte($orderItem->end_date)) {
        return redirect()->route('bimbel.list')
            ->with('error', 'Masa aktif bimbel ini sudah habis.');
    }

    $bimbel = $orderItem->product;

    $sisaWaktu = null;
    if ($orderItem->end_date) {
        $sisaWaktu = now()->diff($orderItem->end_date)
            ->format('%d hari %H jam %I menit %S detik');
    }

    return view('product.bimbel.show', compact('bimbel', 'orderItem', 'sisaWaktu'));
}




    // Halaman daftar kursus
    public function courses(Request $request)
    {
        // Ambil query string 'class' dari tombol
        $class = $request->query('class'); // 'A' atau 'B'

        // Contoh data dummy sesuai class (nanti bisa ganti dengan DB)
        // if ($class === 'A') $courses = Course::where('class', 'A')->get();
        // else $courses = Course::where('class', 'B')->get();
        $courses = []; // kosong dulu

        // kirim $class ke view supaya bisa tampil judul “Bimbel A” / “Bimbel B”
        return view('bimbel.courses.index', compact('class', 'courses'));
    }

    // Proses pendaftaran kursus
    public function enroll(Request $request, $id)
    {
        // Proses logika mendaftar kursus
        // Cek login, simpan ke tabel pivot user_course dsb.

        return redirect()
            ->route('bimbel.courses.show', $id)
            ->with('success', 'Berhasil mendaftar kursus');
    }
}
