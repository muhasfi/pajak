<?php

namespace App\Http\Controllers;

use App\Models\DetailLayanan;
use App\Models\LayananPembuatanPt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DetailLayananController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'layanan_pembuatan_pt_id' => 'required|exists:layanan_pembuatan_pts,id',
            'nama_langkah' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'estimasi_hari' => 'required|integer|min:1',
        ]);

        DetailLayanan::create($request->all());

        return redirect()->back()->with('success', 'Detail langkah berhasil ditambahkan.');
    }

    public function destroy(DetailLayanan $detailLayanan): RedirectResponse
    {
        $detailLayanan->delete();
        
        return redirect()->back()->with('success', 'Detail langkah berhasil dihapus.');
    }
}