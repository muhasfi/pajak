<?php

namespace App\Http\Controllers;

use App\Models\Litigasi;
use Illuminate\Http\Request;

class LitigasiController extends Controller
{
    public function index()
    {
        // Ambil semua data litigasi dengan relasi details
        $litigasi = Litigasi::with('details')->get();
        
        return view('customer.layanan.litigasi', compact('litigasi'));
    }

    public function show($id)
    {
        // Ambil data spesifik untuk detail layanan
        $litigasi = Litigasi::with('details')->findOrFail($id);
        
        return view('detail-litigasi', compact('litigasi'));
    }
}