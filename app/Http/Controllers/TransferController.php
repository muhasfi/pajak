<?php

namespace App\Http\Controllers;

use App\Models\ItemTransfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        // Ambil semua layanan beserta detailnya
        $transfers = ItemTransfer::with('detail')->latest()->get();

        // Kirim ke tampilan customer
        return view('product.layanan.transfer.transfer', compact('transfers'));
    }

    public function show($id)
    {
        $layanan = ItemTransfer::with('detail')->findOrFail($id);
        return view('product.layanan.transfer.transfer_show', compact('layanan'));
    }
}
