<?php

namespace App\Http\Controllers;

use App\Models\ItemKonsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index()
    {
        // Ambil semua layanan dengan relasi detail-nya
        $layanan = ItemKonsultasi::with('detail')->get();

        // Kirim ke view product
        return view('product.konsultasi.private', compact('layanan'));
    }
}
