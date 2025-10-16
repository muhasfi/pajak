<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Webinar;
use App\Models\WebinarDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class WebinarController extends Controller
{
    // Menampilkan daftar webinar
    public function index()
    {
        $webinars = Webinar::latest()->paginate(5);
        return view('customer.pelatihan.webinars', compact('webinars'));
    }

    // Menampilkan form tambah webinar
    public function create()
    {
        return view('admin.webinars.create');
    }

    // Menyimpan webinar baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        
        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('webinars', 'public');
        }

        $webinar = Webinar::create($data);

        // Simpan detail webinar jika ada
        if ($request->has('pembicara')) {
            foreach ($request->pembicara as $key => $pembicara) {
                WebinarDetail::create([
                    'webinar_id' => $webinar->id,
                    'pembicara' => $pembicara,
                    'topik' => $request->topik[$key],
                    'waktu_mulai' => $request->waktu_mulai[$key],
                    'waktu_selesai' => $request->waktu_selesai[$key],
                    'materi' => $request->materi[$key]
                ]);
            }
        }

        return redirect()->route('webinars.index')
                        ->with('success','Webinar berhasil dibuat.');
    }

    // Menampilkan detail webinar
    public function show(Webinar $webinar)
    {
        return view('admin.webinars.show',compact('webinar'));
    }

    // Menampilkan form edit webinar
    public function edit(Webinar $webinar)
    {
        return view('admin.webinars.edit',compact('webinar'));
    }

    // Update webinar
    // Update webinar
public function update(Request $request, Webinar $webinar)
{
    $request->validate([
        'judul' => 'required|max:255',
        'deskripsi' => 'required',
        'tanggal' => 'required|date',
        'harga' => 'required|numeric',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $data = $request->all();
    
    // Handle penghapusan gambar
    if ($request->has('remove_image')) {
        if ($webinar->gambar) {
            Storage::disk('public')->delete($webinar->gambar);
        }
        $data['gambar'] = null;
    }
    
    // Update gambar jika ada file baru
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($webinar->gambar) {
            Storage::disk('public')->delete($webinar->gambar);
        }
        $data['gambar'] = $request->file('gambar')->store('webinars', 'public');
    }

    $webinar->update($data);

    // Update detail webinar
    if ($request->has('pembicara')) {
        // Hapus detail lama
        $webinar->details()->delete();
        
        // Buat detail baru
        foreach ($request->pembicara as $key => $pembicara) {
            WebinarDetail::create([
                'webinar_id' => $webinar->id,
                'pembicara' => $pembicara,
                'topik' => $request->topik[$key],
                'waktu_mulai' => $request->waktu_mulai[$key],
                'waktu_selesai' => $request->waktu_selesai[$key],
                'materi' => $request->materi[$key]
            ]);
        }
    }

    return redirect()->route('webinars.index')
                    ->with('success','Webinar berhasil diupdate');
}

    // Hapus webinar
    public function destroy(Webinar $webinar)
    {
        // Hapus gambar jika ada
        if ($webinar->gambar) {
            Storage::disk('public')->delete($webinar->gambar);
        }
        
        $webinar->delete();
        return redirect()->route('webinars.index')
                        ->with('success','Webinar berhasil dihapus');
    }
}