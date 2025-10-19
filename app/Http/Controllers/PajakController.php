<?php

namespace App\Http\Controllers;

use App\Models\ItemPajak;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    public function index()
{
    $pajaks = ItemPajak::with('detail')->latest()->get();
    return view('product.layanan.jasa_perpajakan', compact('pajaks'));
}

}
