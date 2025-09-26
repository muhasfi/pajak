<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Webinar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class WebinarController extends Controller
{
    public function index()
    {
        $webinars = Webinar::latest()->paginate(10);
        return view('admin.webinars.index', compact('webinars'));
    }

    public function create()
    {
        return view('admin.webinars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('webinars', 'public');
        }

        Webinar::create($data);

        return redirect()->route('webinars.index')->with('success', 'Webinar berhasil ditambahkan.');
    }

    public function show(Webinar $webinar)
    {
        return view('webinars.show', compact('webinar'));
    }

    public function edit(Webinar $webinar)
    {
        return view('admin.webinars.edit', compact('webinar'));
    }

    public function update(Request $request, Webinar $webinar)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($webinar->gambar) {
                Storage::disk('public')->delete($webinar->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('webinars', 'public');
        }

        $webinar->update($data);

        return redirect()->route('webinars.index')->with('success', 'Webinar berhasil diperbarui.');
    }

    public function destroy(Webinar $webinar)
    {
        if ($webinar->gambar) {
            Storage::disk('public')->delete($webinar->gambar);
        }
        $webinar->delete();

        return redirect()->route('webinars.index')->with('success', 'Webinar berhasil dihapus.');
    }
}