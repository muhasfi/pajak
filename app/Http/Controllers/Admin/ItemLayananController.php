<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemLayanan;
use Illuminate\Http\Request;

class ItemLayananController extends Controller
{
    public function index()
    {
        $layanan = ItemLayanan::all();
        return view('admin.layanan.index', compact('layanan'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);

        ItemLayanan::create($request->all());

        return redirect()->route('item_layanan.index')
                         ->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(ItemLayanan $item_layanan)
    {
        return view('admin.layanan.edit', compact('item_layanan'));
    }

    public function update(Request $request, ItemLayanan $item_layanan)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);
    
        $data = $request->all();
        // Jika checkbox tidak dicentang, nilai defaultnya null → kita set ke 0
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
    
        $item_layanan->update($data);
    
        return redirect()->route('item_layanan.index')
                         ->with('success', 'Layanan berhasil diperbarui.');
    }
    

    public function destroy(ItemLayanan $item_layanan)
    {
        $item_layanan->delete();

        return redirect()->route('item_layanan.index')
                         ->with('success', 'Layanan berhasil dihapus.');
    }
    public function customerIndex()
{
    $layanan = ItemLayanan::where('is_active', 1)->get();
    return view('layanan.index', compact('layanan'));
}

}
