<?php

namespace App\Http\Controllers;

use App\Models\BrevetAB;
use Illuminate\Http\Request;

class BrevetABController extends Controller
{
    public function index()
{
    $brevetabs = BrevetAB::orderBy('harga', 'asc')->get();
    return view('product.pelatihan.brevet_ab', compact('brevetabs'));
}

}
