<?php

namespace App\Http\Controllers;

use App\Models\ItemSeminar;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
     public function index()
    {
        // Ambil data seminar beserta detailnya
        $seminars = ItemSeminar::with('detail')->latest()->get();

        return view('product.pelatihan.seminar', compact('seminars'));
    }
}
