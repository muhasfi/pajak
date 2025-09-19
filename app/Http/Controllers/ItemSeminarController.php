<?php

namespace App\Http\Controllers;

use App\Models\ItemSeminar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemSeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemSeminars = ItemSeminar::all();
        return view('admin.seminar.index', compact('itemSeminars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.seminar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        
        // Handle image upload
        if ($request->hasFile('img')) {
            $imageName = time().'.'.$request->img->extension();  
            $request->img->storeAs('public/item_seminars', $imageName);
            $data['img'] = $imageName;
        }

        $data['is_active'] = $request->has('is_active') ? true : false;

        ItemSeminar::create($data);

        return redirect()->route('item-seminars.index')
            ->with('success', 'Item seminar berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $itemSeminar = ItemSeminar::findOrFail($id);
        return view('admin.seminar.show', compact('itemSeminar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $itemSeminar = ItemSeminar::findOrFail($id);
        return view('admin.seminar.edit', compact('itemSeminar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $itemSeminar = ItemSeminar::findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        
        // Handle image upload
        if ($request->hasFile('img')) {
            // Delete old image if exists
            if ($itemSeminar->img) {
                Storage::delete('public/item_seminars/'.$itemSeminar->img);
            }
            
            $imageName = time().'.'.$request->img->extension();  
            $request->img->storeAs('public/item_seminars', $imageName);
            $data['img'] = $imageName;
        }

        $data['is_active'] = $request->has('is_active') ? true : false;

        $itemSeminar->update($data);

        return redirect()->route('item-seminars.index')
            ->with('success', 'Item seminar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $itemSeminar = ItemSeminar::findOrFail($id);
        
        // Delete image if exists
        if ($itemSeminar->img) {
            Storage::delete('public/item_seminars/'.$itemSeminar->img);
        }
        
        $itemSeminar->delete();

        return redirect()->route('item-seminars.index')
            ->with('success', 'Item seminar berhasil dihapus.');
    }
}