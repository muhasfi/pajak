<?php

namespace App\Http\Controllers;

use App\Models\ItemAccountingService;
use Illuminate\Http\Request;

class AccountingServiceController extends Controller
{
    public function index()
    {
        $services = ItemAccountingService::with('details')->get();
        return view('product.layanan.jasa_akuntansi', compact('services'));
    }
}
