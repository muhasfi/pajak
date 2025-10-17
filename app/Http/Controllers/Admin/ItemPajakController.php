<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemPajak;
use App\Models\ItemPajakDetail;
use Illuminate\Http\Request;

class ItemPajakController extends Controller
{
    public function index()
    {
        $pajaks = ItemPajak::with('detail')->get();
        return view('admin.pajak.index', compact('pajaks'));
    }

    public function create()
    {
        return view('admin.pajak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'string|max:255'
        ]);

        $pajak = ItemPajak::create([
            'judul' => $request->judul,
            'harga' => $request->harga,
        ]);

        ItemPajakDetail::create([
            'pajak_id' => $pajak->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit,
        ]);

        return redirect()->route('admin.pajak.index')->with('success', 'Layanan pajak berhasil ditambahkan!');
    }

    public function show($id)
    {
        $pajak = ItemPajak::with('detail')->findOrFail($id);
        return view('admin.pajak.show', compact('pajak'));
    }

   
    public function edit($id)
    {
        $pajak = ItemPajak::with('detail')->findOrFail($id);
        
        // Jika data detail tidak ada, buat object kosong
        if (!$pajak->detail) {
            $pajak->detail = new \App\Models\ItemPajakDetail();
            $pajak->detail->benefit = [];
        }
        
        return view('admin.pajak.edit', compact('pajak'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array|min:1',
            'benefit.*' => 'required|string|max:255'
        ], [
            'benefit.required' => 'Minimal satu benefit harus diisi',
            'benefit.*.required' => 'Setiap benefit tidak boleh kosong',
            'benefit.*.max' => 'Benefit maksimal 255 karakter'
        ]);

        $pajak = ItemPajak::findOrFail($id);
        
        // Update data utama
        $pajak->update([
            'judul' => $request->judul,
            'harga' => $request->harga,
        ]);

        // Filter benefit yang tidak kosong
        $filteredBenefits = array_filter($request->benefit, function($benefit) {
            return !empty(trim($benefit));
        });

        // Update atau create detail
        if ($pajak->detail) {
            $pajak->detail->update([
                'deskripsi' => $request->deskripsi,
                'benefit' => $filteredBenefits,
            ]);
        } else {
            \App\Models\ItemPajakDetail::create([
                'pajak_id' => $pajak->id,
                'deskripsi' => $request->deskripsi,
                'benefit' => $filteredBenefits,
            ]);
        }

        return redirect()->route('admin.pajak.index')
            ->with('success', 'Layanan pajak berhasil diupdate!');
    }
    public function destroy($id)
    {
        $pajak = ItemPajak::findOrFail($id);
        $pajak->delete();

        return redirect()->route('admin.pajak.index')->with('success', 'Layanan pajak berhasil dihapus!');
    }
}
