<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|array',
            'harga' => 'nullable|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('services', 'public');
        }
        
        Service::create($data);
        
        return redirect()->route('services.index')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'category_id' => 'required',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|array',
            'harga' => 'nullable|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('services', 'public');
        }
        
        $service->update($data);
        

        return redirect()->route('services.index')->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Layanan berhasil dihapus');
    }
}
