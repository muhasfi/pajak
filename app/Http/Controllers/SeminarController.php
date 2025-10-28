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

        return view('product.pelatihan.seminar.seminar', compact('seminars'));
    }

    public function show($id)
    {
        // Ambil data seminar beserta relasi detail-nya
        $seminar = ItemSeminar::with('detail')->findOrFail($id);

        // Ambil 1 detail pertama (jika ada)
        $detail = $seminar->detail->first();

        return view('product.pelatihan.seminar.seminar_show', compact('seminar', 'detail'));
    }
}
