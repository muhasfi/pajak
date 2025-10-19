<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemLayananPt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemLayananPtController extends Controller
{
    public function index(): View
    {
        $layanans = ItemLayananPt::with('detail')->latest()->get();
        return view('admin.layanan_pt.index', compact('layanans'));
    }

    public function create(): View
    {
        return view('admin.layanan_pt.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'paket' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'string|distinct|min:1'
        ]);

        $layanan = ItemLayananPt::create($request->only(['judul', 'harga']));
        
        $layanan->detail()->create([
            'deskripsi' => $request->deskripsi,
            'paket' => $request->paket,
            'benefit' => $request->benefit
        ]);

        return redirect()->route('admin.layanan-pt.index')->with('success', 'Layanan berhasil dibuat!');
    }

    public function show(ItemLayananPt $layananPt): View
    {
        $layananPt->load('detail');
        return view('layanan_pt.show', compact('layananPt'));
    }

    public function edit(ItemLayananPt $layananPt): View
    {
        $layananPt->load('detail');
        return view('admin.layanan_pt.edit', compact('layananPt'));
    }

    public function update(Request $request, ItemLayananPt $layananPt): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'paket' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'string|distinct|min:1'
        ]);

        $layananPt->update($request->only(['judul', 'harga']));
        $layananPt->detail->update([
            'deskripsi' => $request->deskripsi,
            'paket' => $request->paket,
            'benefit' => $request->benefit
        ]);

        return redirect()->route('admin.layanan-pt.index')->with('success', 'Layanan berhasil diupdate!');
    }

    public function destroy(ItemLayananPt $layananPt): RedirectResponse
    {
        $layananPt->detail()->delete();
        $layananPt->delete();
        return redirect()->route('admin.layanan-pt.index')->with('success', 'Layanan berhasil dihapus!');
    }
}
