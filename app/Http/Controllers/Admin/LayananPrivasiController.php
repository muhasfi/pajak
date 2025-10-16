<?php
// app/Http/Controllers/LayananPrivasiController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LayananPrivasi;
use App\Models\PrivasiDetail;
use Illuminate\Http\Request;

class LayananPrivasiController extends Controller
{
    public function index()
    {
        $layanan = LayananPrivasi::with('privasiDetails')->get();
        return view('admin.private.index', compact('layanan'));
    }

    public function create()
    {
        return view('admin.private.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'waktu_menit' => 'required|integer|min:1',
            'benefit' => 'required|array',
            'benefit.*' => 'required|string'
        ]);

        // Create layanan privasi
        $layanan = LayananPrivasi::create([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        // Create privasi detail
        PrivasiDetail::create([
            'layanan_privasi_id' => $layanan->id,
            'waktu_menit' => $request->waktu_menit,
            'benefit' => $request->benefit
        ]);

        return redirect()->route('layanan-privasi.index')
            ->with('success', 'Layanan privasi berhasil dibuat.');
    }

    public function show($id)
    {
        $layanan = LayananPrivasi::with('privasiDetails')->findOrFail($id);
        return view('layanan-privasi.show', compact('layanan'));
    }

    public function edit($id)
    {
        $layanan = LayananPrivasi::with('privasiDetails')->findOrFail($id);
        return view('admin.private.edit', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'waktu_menit' => 'required|integer|min:1',
            'benefit' => 'required|array',
            'benefit.*' => 'required|string'
        ]);

        $layanan = LayananPrivasi::findOrFail($id);
        
        // Update layanan privasi
        $layanan->update([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        // Update atau create privasi detail
        $privasiDetail = PrivasiDetail::where('layanan_privasi_id', $id)->first();
        if ($privasiDetail) {
            $privasiDetail->update([
                'waktu_menit' => $request->waktu_menit,
                'benefit' => $request->benefit
            ]);
        }

        return redirect()->route('layanan-privasi.index')
            ->with('success', 'Layanan privasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $layanan = LayananPrivasi::findOrFail($id);
        $layanan->delete();

        return redirect()->route('layanan-privasi.index')
            ->with('success', 'Layanan privasi berhasil dihapus.');
    }
}