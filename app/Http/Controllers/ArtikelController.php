<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    public function index()
    {
        // ambil artikel yang status publish
        $artikels = Artikel::where('status', 'publish')
            ->orderBy('publish_date', 'desc')
            ->paginate(6); // biar ada pagination

        return view('artikel.index_user', compact('artikels'));
    }

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        $ip = request()->ip();

        // Insert jika belum ada
        DB::table('artikel_views')->insertOrIgnore([
            'artikel_id' => $artikel->id,
            'ip_address' => $ip,
            'created_at' => now()
        ]);

        // Hitung total view unik
        $totalViews = DB::table('artikel_views')
            ->where('artikel_id', $artikel->id)
            ->count();

        // Optional: update kolom views di tabel artikels
        $artikel->views = $totalViews;
        $artikel->save();

        // ✅ Ambil artikel populer, tapi tidak termasuk artikel yang sedang dibaca
        $popularArticles = Artikel::where('status', 'publish')
            ->where('id', '!=', $artikel->id) // <— baris penting
            ->orderBy('views', 'desc')
            ->orderBy('publish_date', 'desc')
            ->take(5)
            ->get();

        $currentUrl = url()->current();

        return view('artikel.show_user', compact('artikel', 'totalViews', 'popularArticles', 'currentUrl'));
    }

}
