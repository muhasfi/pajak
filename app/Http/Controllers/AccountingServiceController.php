<?php

namespace App\Http\Controllers;

use App\Models\ItemAccountingService;
use Illuminate\Http\Request;

class AccountingServiceController extends Controller
{
    public function index()
    {
        $services = ItemAccountingService::with('detail')->get();
        return view('product.layanan.jasa_akuntansi.jasa_akuntansi', compact('services'));
    }

    public function show($id)
    {
        $layanan = ItemAccountingService::with('detail')->findOrFail($id);
        return view('product.layanan.jasa_akuntansi.jasa_akuntansi_show', compact('layanan'));
    }
}
