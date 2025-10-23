<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemBimbel;
use App\Models\ItemBimbelDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemBimbelController extends Controller
{
    public function index()
    {
        $bimbels = ItemBimbel::with('details')->get();
        return view('admin.bimbel.index', compact('bimbels'));
    }

    public function create()
    {
        return view('admin.bimbel.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'harga' => 'required|numeric|min:0',
        'deskripsi' => 'nullable|string',
        'gambar' => 'nullable|file|image|max:2048',

        // validasi untuk detail materi
        'detail' => 'nullable|array',
        'detail.*.judul_materi' => 'nullable|string|max:255',
        'detail.*.deskripsi' => 'nullable|string',
        'detail.*.link' => 'nullable|string|max:255',
    ]);

    DB::beginTransaction();
    try {
        // Upload gambar jika ada
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('bimbel', 'public');
        }

        // Simpan data utama ke tabel item_bimbels
        $bimbel = ItemBimbel::create([
            'judul' => $validated['judul'],
            'harga' => $validated['harga'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'gambar' => $gambarPath,
            'status' => true,
        ]);

        // Simpan data detail ke tabel item_bimbel_detail (jika ada)
        if (!empty($validated['detail'])) {
            foreach ($validated['detail'] as $d) {
                $bimbel->details()->create([
                    'item_bimbel_id' => $bimbel->id, // foreign key
                    'judul_materi'   => $d['judul_materi'] ?? null,
                    'deskripsi'      => $d['deskripsi'] ?? null,
                    'link'           => $d['link'] ?? null,
                ]);
            }
        }

        DB::commit();
        return redirect()
            ->route('admin.bimbel.index')
            ->with('success', 'Paket bimbel berhasil ditambahkan.');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()
            ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])
            ->withInput();
    }
}


    public function show($id)
    {
        $bimbel = ItemBimbel::with('details')->findOrFail($id);
        return view('admin.bimbel.show', compact('bimbel'));
    }

    public function edit($id)
    {
        $bimbel = ItemBimbel::findOrFail($id);
        return view('admin.bimbel.edit', compact('bimbel'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|file|image|max:2048',

            // hanya satu detail
            'detail.judul_materi' => 'nullable|string|max:255',
            'detail.deskripsi' => 'nullable|string',
            'detail.link' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $bimbel = ItemBimbel::findOrFail($id);

            // Upload gambar baru jika ada
            if ($request->hasFile('gambar')) {
                $gambarPath = $request->file('gambar')->store('bimbel', 'public');
                $bimbel->gambar = $gambarPath;
            }

            // Update data utama
            $bimbel->update([
                'judul' => $validated['judul'],
                'harga' => $validated['harga'],
                'deskripsi' => $validated['deskripsi'] ?? null,
            ]);

            // Update / buat detail tunggal
            $detailData = $validated['detail'] ?? null;

            if ($detailData) {
                $existingDetail = $bimbel->details()->first();

                if ($existingDetail) {
                    $existingDetail->update($detailData);
                } else {
                    $bimbel->details()->create($detailData);
                }
            }

            DB::commit();
            return redirect()->route('admin.bimbel.index')->with('success', 'Paket bimbel berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        $bimbel = ItemBimbel::findOrFail($id);
        $bimbel->delete();

        return redirect()->route('admin.bimbel.index')->with('success', 'Bimbel berhasil dihapus');
    }
}
