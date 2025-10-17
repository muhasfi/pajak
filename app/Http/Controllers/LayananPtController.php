<?php

namespace App\Http\Controllers;

use App\Models\ItemLayananPt;
use Illuminate\Http\Request;

class LayananPtController extends Controller
{
    public function index()
{
    $layanans = ItemLayananPt::with('detail')->latest()->get();
    return view('product.layanan.corporate-services', compact('layanans'));
}
}
