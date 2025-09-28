<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        // ambil artikel yang status publish
        $artikels = Artikel::where('status', 'publish')
            ->orderBy('created_at', 'desc') // gunakan created_at untuk urutan tanggal
            ->paginate(6);

        return view('artikel.index_user', compact('artikels'));
    }

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        return view('artikel.show_user', compact('artikel'));
    }
}
