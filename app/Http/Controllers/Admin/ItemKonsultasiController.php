<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemKonsultasi;
use App\Models\ItemKonsultasiDetail;
use Illuminate\Http\Request;

class ItemKonsultasiController extends Controller
{
    public function index()
    {
        $layanan = ItemKonsultasi::with('detail')->get();
        return view('admin.konsultasi.index', compact('layanan'));
    }

    public function create()
    {
        return view('admin.konsultasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'waktu_menit' => 'required|integer|min:1',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'required|string'
        ]);

        // Create layanan konsultasi
        $layanan = ItemKonsultasi::create([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        // Create konsultasi detail
        ItemKonsultasiDetail::create([
            'item_konsultasi_id' => $layanan->id,
            'waktu_menit' => $request->waktu_menit,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit
        ]);

        return redirect()->route('admin.konsultasi.index')
            ->with('success', 'Layanan privasi berhasil dibuat.');
    }

    public function show($id)
    {
        $layanan = ItemKonsultasi::with('detail')->findOrFail($id);
        return view('admin.konsultasi.show', compact('layanan'));
    }

    public function edit($id)
    {
        $layanan = ItemKonsultasi::with('detail')->findOrFail($id);
        return view('admin.konsultasi.edit', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'waktu_menit' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string',
            'benefit' => 'required|array',
            'benefit.*' => 'required|string'
        ]);

        $layanan = ItemKonsultasi::findOrFail($id);

        // Update layanan konsultasi
        $layanan->update([
            'judul' => $request->judul,
            'harga' => $request->harga
        ]);

        // Update atau create konsultasi detail
        $konsultasiDetail = ItemKonsultasiDetail::where('item_konsultasi_id', $id)->first();
        if ($konsultasiDetail) {
            $konsultasiDetail->update([
                'waktu_menit' => $request->waktu_menit,
                'deskripsi' => $request->deskripsi,
                'benefit' => $request->benefit
            ]);
        }

        return redirect()->route('admin.konsultasi.index')
            ->with('success', 'Layanan konsultasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $layanan = ItemKonsultasi::findOrFail($id);
        $layanan->delete();

        return redirect()->route('admin.konsultasi.index')
            ->with('success', 'Layanan konsultasi berhasil dihapus.');
    }
}
