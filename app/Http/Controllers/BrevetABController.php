<?php

namespace App\Http\Controllers;


use App\Models\ItemBrevetAB;
use Illuminate\Http\Request;

class BrevetABController extends Controller
{
    public function index()
    {
        $brevetabs = ItemBrevetAB::with('detail')->orderBy('harga', 'asc')->get();
        // dd($brevetabs->toArray());

        return view('product.pelatihan.brevetAB.brevet_ab', compact('brevetabs'));
    }

    public function show($id)
    {
        $brevet = ItemBrevetAB::with('detail')->findOrFail($id);
        return view('product.pelatihan.brevetAB.brevet_ab_show', compact('brevet'));
    }

}
