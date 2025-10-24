<?php

namespace App\Http\Controllers;

use App\Models\ItemBrevetC;
use Illuminate\Http\Request;

class BrevetCController extends Controller
{
    public function index()
{
    $brevetc = ItemBrevetC::with('detail')->orderBy('harga', 'asc')->get();
    return view('product.pelatihan.brevet_c', compact('brevetc'));
}

}
