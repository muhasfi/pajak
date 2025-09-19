<?php

namespace App\Http\Controllers;

use App\Models\ItemArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemArtikelController extends Controller
{
    public function index()
    {
        $artikels = ItemArtikel::all();
        return view('admin.product.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('admin.product.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('artikel_images', 'public');
            $data['img'] = $imagePath;
        }

        $data['is_active'] = $request->has('is_active');

        ItemArtikel::create($data);

        return redirect()->route('admin.product.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show($id)
    {
        $artikel = ItemArtikel::findOrFail($id);
        return view('customer.artikel.show', compact('artikel'));
    }

    public function edit($id)
    {
        $artikel = ItemArtikel::findOrFail($id);
        return view('admin.product.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        $artikel = ItemArtikel::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('img')) {
            // Hapus gambar lama jika ada
            if ($artikel->img) {
                Storage::disk('public')->delete($artikel->img);
            }
            
            $imagePath = $request->file('img')->store('artikel_images', 'public');
            $data['img'] = $imagePath;
        }

        $data['is_active'] = $request->has('is_active');

        $artikel->update($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = ItemArtikel::findOrFail($id);
        
        // Hapus gambar jika ada
        if ($artikel->img) {
            Storage::disk('public')->delete($artikel->img);
        }
        
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
    
    // Tampilan untuk customer
    public function catalog()
    {
        $artikels = ItemArtikel::where('is_active', true)->get();
        return view('customer.artikel.catalog', compact('artikels'));
    }
}