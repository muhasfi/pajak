<?php

namespace App\Http\Controllers;

use App\Models\BrevetC;
use Illuminate\Http\Request;

class BrevetCController extends Controller
{
    public function index()
{
    $brevetc = BrevetC::orderBy('harga', 'asc')->get();
    return view('product.pelatihan.brevet_c', compact('brevetc'));
}

}
