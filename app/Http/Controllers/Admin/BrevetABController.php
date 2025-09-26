<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrevetAB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrevetABController extends Controller
{
    public function index()
    {
        $brevetAB = BrevetAB::all();
        return view('admin.brevet-ab.index', compact('brevetAB'));
    }

    public function create()
    {
        return view('admin.brevet-ab.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'hari' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'harga' => 'required|numeric|min:0'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('public/brevet-ab', $imageName);
            $data['gambar'] = $imageName;
        }

        BrevetAB::create($data);

        return redirect()->route('brevet-ab.index')
            ->with('success', 'Data brevet AB berhasil ditambahkan.');
    }

    // public function show(BrevetAB $brevetAB)
    // {
    //     return view('admin.brevet-ab.show', compact('brevetAB'));
    // }

    public function edit(BrevetAB $brevet_ab) // Ganti parameter menjadi $brevet_ab
{
    return view('admin.brevet-ab.edit', compact('brevet_ab'));
}

    public function update(Request $request, BrevetAB $brevet_ab)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'hari' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'harga' => 'required|numeric|min:0'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($brevet_ab->gambar) {
                Storage::delete('public/brevet-ab/' . $brevet_ab->gambar);
            }
            
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('public/brevet-ab', $imageName);
            $data['gambar'] = $imageName;
        }

        $brevet_ab->update($request->all());
        return redirect()->route('brevet-ab.index')->with('success', 'Data berhasil diupdate.');
    }

    // Menggunakan Route Model Binding
public function destroy(BrevetAB $brevet_ab)
{
    // Hapus gambar dari storage jika ada (opsional)
    if ($brevet_ab->gambar) {
        Storage::delete('public/brevet-ab/' . $brevet_ab->gambar);
    }

    $brevet_ab->delete(); // Hapus data dari database

    return redirect()->route('brevet-ab.index')
        ->with('success', 'Data berhasil dihapus.');
}
}
