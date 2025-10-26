<?php

namespace App\Http\Controllers;

use App\Models\ItemPajak;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    public function index()
    {
        $pajaks = ItemPajak::with('detail')->latest()->get();
        return view('product.layanan.jasa_perpajakan.jasa_perpajakan', compact('pajaks'));
    }

    public function show($id)
    {
        $layanan = ItemPajak::with('detail')->findOrFail($id);
        return view('product.layanan.jasa_perpajakan.jasa_perpajakan_show', compact('layanan'));
    }

}
