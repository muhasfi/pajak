<?php

namespace App\Http\Controllers;

use App\Models\ItemBimbel;
use Illuminate\Http\Request;

class BimbelController extends Controller
{
    public function index()
    {
        // Ambil hanya yang aktif
        $bimbels = ItemBimbel::where('status', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('product.bimbel.bimbel', compact('bimbels'));
    }

    public function show($id)
    {
        $bimbel = ItemBimbel::with('detail')->findOrFail($id);
        return view('product.bimbel.bimbel_show', compact('bimbel'));
    }

}
