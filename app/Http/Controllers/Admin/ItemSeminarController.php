<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemSeminar;
// use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemSeminarController extends Controller
{
    public function index(Request $request)
    {
        $query = ItemSeminar::query();

        // Filter tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $seminars = $query->latest()->paginate(10);
        return view('admin.seminar.index', compact('seminars'));
    }

    public function create()
    {
        return view('admin.seminar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'tanggal' => 'required|date',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('seminars', 'public');
        }

        ItemSeminar::create($data);
        return redirect()->route('item-seminars.index')->with('success', 'Seminar berhasil ditambahkan.');
    }

    public function edit(ItemSeminar $item_seminar)
    {
        return view('admin.seminar.edit', compact('item_seminar'));
    }

    public function update(Request $request, ItemSeminar $item_seminar)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'tanggal' => 'required|date',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('img')) {
            if ($item_seminar->img) {
                Storage::disk('public')->delete($item_seminar->img);
            }
            $data['img'] = $request->file('img')->store('seminars', 'public');
        }

        $item_seminar->update($data);
        return redirect()->route('admin.seminar.index')->with('success', 'Seminar berhasil diperbarui.');
    }

    public function destroy(ItemSeminar $item_seminar)
    {
        if ($item_seminar->img) {
            Storage::disk('public')->delete($item_seminar->img);
        }
        $item_seminar->delete();
        return redirect()->route('item-seminars.index')->with('success', 'Seminar berhasil dihapus.');
    }
}
