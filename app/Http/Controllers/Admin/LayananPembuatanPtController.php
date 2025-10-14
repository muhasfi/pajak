<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LayananPembuatanPt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LayananPembuatanPtController extends Controller
{
    public function index(): View
    {
        $layanans = LayananPembuatanPt::latest()->paginate(5);
        return view('admin.layanan_pt.index', compact('layanans'));
    }
    public function create(): View
    {
        return view('admin.layanan_pt.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);
        LayananPembuatanPt::create($request->all());
        return redirect()->route('layanan-pt.index')->with('success', 'Layanan berhasil dibuat.');
    }
    public function show(LayananPembuatanPt $layananPembuatanPt): View
    {
        // Eager Load detail layanan untuk ditampilkan
        $layananPembuatanPt->load('detailLayanans');
        return view('layanan_pt.show', compact('layananPembuatanPt'));
    }
    public function edit(LayananPembuatanPt $layanan_pt)
{
    return view('admin.layanan_pt.edit', compact('layanan_pt'));
}
    public function update(Request $request, LayananPembuatanPt $layanan_pt): RedirectResponse
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);
        $layanan_pt->update($request->all());
        return redirect()->route('layanan-pt.index')->with('success', 'Layanan berhasil diupdate.');
    }
    public function destroy(LayananPembuatanPt $layanan_pt): RedirectResponse
    {
        $layanan_pt->delete();
        return redirect()->route('layanan-pt.index')->with('success', 'Layanan berhasil dihapus.');
    }
}