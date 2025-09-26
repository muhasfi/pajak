<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemBook;
use App\Models\ItemDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemBooks = ItemBook::all();
        return view('admin.book.index', compact('itemBooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        if ($request->hasFile('img')) {
            $imageName = time().'.'.$request->img->extension();  
            $request->img->move(public_path('images'), $imageName);
            $data['img'] = $imageName;
        }

        ItemBook::create($data);

        return redirect()->route('item-books.index')
                         ->with('success', 'Item book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $itemBook = ItemBook::findOrFail($id);
        return view('admin.book.show', compact('itemBook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $itemBook = ItemBook::findOrFail($id);
        return view('admin.book.edit', compact('itemBook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        $itemBook = ItemBook::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('img')) {
            // Delete old image if exists
            if ($itemBook->img && file_exists(public_path('images/'.$itemBook->img))) {
                unlink(public_path('images/'.$itemBook->img));
            }
            
            $imageName = time().'.'.$request->img->extension();  
            $request->img->move(public_path('images'), $imageName);
            $data['img'] = $imageName;
        }

        $itemBook->update($data);

        return redirect()->route('item-books.index')
                         ->with('success', 'Item book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $itemBook = ItemBook::findOrFail($id);
        
        // Delete image if exists
        if ($itemBook->img && file_exists(public_path('images/'.$itemBook->img))) {
            unlink(public_path('images/'.$itemBook->img));
        }
        
        $itemBook->delete();

        return redirect()->route('item-books.index')
                         ->with('success', 'Item book deleted successfully.');
    }


    
}
