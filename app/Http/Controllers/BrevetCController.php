<?php

namespace App\Http\Controllers;

use App\Models\ItemBrevetC;
use Illuminate\Http\Request;

class BrevetCController extends Controller
{
    public function index()
{
    $brevetc = ItemBrevetC::orderBy('harga', 'asc')->get();
    return view('product.pelatihan.brevet_c', compact('brevetc'));
}

}
