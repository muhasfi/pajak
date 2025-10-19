<?php

namespace App\Http\Controllers;

use App\Models\ItemLitigasi;
use Illuminate\Http\Request;

class LitigasiController extends Controller
{
    public function index()
    {
        // Ambil semua layanan litigasi dengan relasi detailnya
        $litigasi = ItemLitigasi::with('detail')->latest()->get();

        // Kirim ke view customer
        return view('product.layanan.litigasi', compact('litigasi'));
    }
}
