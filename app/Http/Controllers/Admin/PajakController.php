<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pajak;
use App\Models\PajakDetail;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pajaks = Pajak::with('detail')->get();
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

        $pajak = Pajak::create([
            'judul' => $request->judul,
            'harga' => $request->harga,
        ]);

        PajakDetail::create([
            'pajak_id' => $pajak->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit,
        ]);

        return redirect()->route('pajak.index')->with('success', 'Layanan pajak berhasil ditambahkan!');
    }

    public function show($id)
    {
        $pajak = Pajak::with('detail')->findOrFail($id);
        return view('pajak.show', compact('pajak'));
    }

   
public function edit($id)
{
    $pajak = Pajak::with('detail')->findOrFail($id);
    
    // Jika data detail tidak ada, buat object kosong
    if (!$pajak->detail) {
        $pajak->detail = new \App\Models\PajakDetail();
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

    $pajak = Pajak::findOrFail($id);
    
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
        \App\Models\PajakDetail::create([
            'pajak_id' => $pajak->id,
            'deskripsi' => $request->deskripsi,
            'benefit' => $filteredBenefits,
        ]);
    }

    return redirect()->route('pajak.index')
        ->with('success', 'Layanan pajak berhasil diupdate!');
}
    public function destroy($id)
    {
        $pajak = Pajak::findOrFail($id);
        $pajak->delete();

        return redirect()->route('pajak.index')->with('success', 'Layanan pajak berhasil dihapus!');
    }
}
