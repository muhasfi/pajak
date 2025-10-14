<?php

namespace App\Http\Controllers;
use App\Models\LayananPt;
use App\Models\LayananPtDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LayananPtController extends Controller
{
    public function index(): View
    {
        $layanans = LayananPt::with('detail')->latest()->paginate(5);
        return view('layanan_pt.index', compact('layanans'));
    }

    public function create(): View
    {
        return view('layanan_pt.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'string|distinct|min:1'
        ]);

        $layanan = LayananPt::create($request->only(['judul', 'harga']));
        
        $layanan->detail()->create([
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit
        ]);

        return redirect()->route('layanan-pt.index')->with('success', 'Layanan berhasil dibuat!');
    }

    public function show(LayananPt $layananPt): View
    {
        $layananPt->load('detail');
        return view('layanan_pt.show', compact('layananPt'));
    }

    public function edit(LayananPt $layananPt): View
    {
        $layananPt->load('detail');
        return view('layanan_pt.edit', compact('layananPt'));
    }

    public function update(Request $request, LayananPt $layananPt): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'benefit' => 'required|array',
            'benefit.*' => 'string|distinct|min:1'
        ]);

        $layananPt->update($request->only(['judul', 'harga']));
        $layananPt->detail->update([
            'deskripsi' => $request->deskripsi,
            'benefit' => $request->benefit
        ]);

        return redirect()->route('layanan-pt.index')->with('success', 'Layanan berhasil diupdate!');
    }

    public function destroy(LayananPt $layananPt): RedirectResponse
    {
        $layananPt->detail()->delete();
        $layananPt->delete();
        return redirect()->route('layanan-pt.index')->with('success', 'Layanan berhasil dihapus!');
    }
}