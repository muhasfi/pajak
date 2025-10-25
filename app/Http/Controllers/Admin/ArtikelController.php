<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        // Fetch all items from the database
        $items = Artikel::orderBy('title', 'asc')->get();

        // Return the view with the items
        return view('admin.artikel.index', compact('items'));
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file     = $request->file('upload');
            $filename = time().'_'.$file->getClientOriginalName();

            // simpan ke public/uploads/ckeditor
            $file->move(public_path('uploads/ckeditor'), $filename);

            $url = asset('uploads/ckeditor/'.$filename);

            // CKEditor butuh format ini
            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }

        return response()->json([
            'uploaded' => false,
            'error' => [
                'message' => 'Tidak ada file yang diupload.'
            ]
        ]);
    }

    public function store(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'slug'      => 'nullable|string|max:255|unique:artikels,slug',
            'excerpt'   => 'nullable|string|max:500',
            'content'   => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'status'    => 'required|in:publish,draft',
        ]);

        // 2. Generate slug otomatis kalau slug kosong
        $slug = $validated['slug'] ?? Str::slug($validated['title']);
        $count = Artikel::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        // 3. Upload thumbnail jika ada
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // 4. Simpan ke database
        $artikel = Artikel::create([
            'title'     => $validated['title'],
            'slug'      => $slug,
            'excerpt'   => $validated['excerpt'],
            'content'   => $validated['content'],
            'thumbnail' => $thumbnailPath,
            'status'    => $validated['status'],
            'published_at' => $validated['status'] === 'publish' ? now() : null,
        ]);

        // 5. Redirect dengan pesan sukses
        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        // 1. Validasi input
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'slug'      => 'nullable|string|max:255|unique:artikels,slug,' . $artikel->id,
            'excerpt'   => 'nullable|string|max:500',
            'content'   => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'status'    => 'required|in:publish,draft',
        ]);

        // 2. Generate slug otomatis kalau slug kosong
        $slug = $validated['slug'] ?? \Illuminate\Support\Str::slug($validated['title']);
        $count = \App\Models\Artikel::where('slug', 'LIKE', "{$slug}%")
            ->where('id', '!=', $artikel->id)
            ->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        // 3. Upload thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            // hapus thumbnail lama kalau ada
            if ($artikel->thumbnail && Storage::disk('public')->exists($artikel->thumbnail)) {
                Storage::disk('public')->delete($artikel->thumbnail);
            }
            $artikel->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        if ($request->has('remove_thumbnail') && $request->remove_thumbnail) {
            if ($artikel->thumbnail && Storage::disk('public')->exists($artikel->thumbnail)) {
                Storage::disk('public')->delete($artikel->thumbnail);
            }
            $artikel->thumbnail = null;
        }

        // Upload thumbnail baru jika ada
        if ($request->hasFile('thumbnail')) {
            // hapus thumbnail lama kalau ada
            if ($artikel->thumbnail && Storage::disk('public')->exists($artikel->thumbnail)) {
                Storage::disk('public')->delete($artikel->thumbnail);
            }
            $artikel->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // 4. Update data
        $artikel->update([
            'title'       => $validated['title'],
            'slug'        => $slug,
            'excerpt'     => $validated['excerpt'],
            'content'     => $validated['content'],
            'status'      => $validated['status'],
            'published_at'=> $validated['status'] === 'publish' ? ($artikel->published_at ?? now()) : null,
            'thumbnail'   => $artikel->thumbnail, // jika upload baru akan diganti
        ]);

        // 5. Redirect
        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.show', compact('artikel'));
    }

    public function destroy($id)
{
    $artikel = Artikel::findOrFail($id);

    // hapus thumbnail kalau ada
    if ($artikel->thumbnail && Storage::disk('public')->exists($artikel->thumbnail)) {
        Storage::disk('public')->delete($artikel->thumbnail);
    }

    $artikel->delete();

    return redirect()->route('admin.artikel.index')
        ->with('success', 'Artikel berhasil dihapus!');
}



}
