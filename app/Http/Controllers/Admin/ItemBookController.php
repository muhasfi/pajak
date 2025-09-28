<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemBookController extends Controller
{
    public function index() {
        // Fetch all items from the database
        $items = Item::orderBy('name', 'asc')->get();

        // Return the view with the items
        return view('admin.book.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::orderBy('cat_name', 'asc')->get();

        // Return the view to create a new item
        return view('admin.book.create', compact('categories'));
    }

    public function store(Request $request)
    {
         // Validasi input
        $validated = $request->validate([
            // item
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'price'         => 'required|integer',
            'img'           => 'nullable|image|mimes:jpg,jpeg,png',
            'is_active'     => 'boolean',

            // item_details
            'file_path'     => 'nullable|string|max:255',
            'video_url'     => 'nullable|url',
            'zoom_link'     => 'nullable|url',
            'event_date'    => 'nullable|date',
            'duration_days' => 'nullable|integer',
        ]);

        DB::beginTransaction();

        try {
            // Upload gambar (jika ada)
            $imgPath = null;
            if ($request->hasFile('img')) {
                $imgPath = $request->file('img')->store('items', 'public');
            }

            // Simpan item
            $item = Item::create([
                'name'        => $validated['name'],
                'description' => $validated['description'] ?? null,
                'price'       => $validated['price'],
                'img'         => $imgPath,
                'is_active'   => $validated['is_active'] ?? 1,
            ]);

            // Simpan detail item
            ItemDetail::create([
                'item_id'       => $item->id,
                'file_path'     => $validated['file_path'] ?? null,
                'video_url'     => $validated['video_url'] ?? null,
                'zoom_link'     => $validated['zoom_link'] ?? null,
                'event_date'    => $validated['event_date'] ?? null,
                'duration_days' => $validated['duration_days'] ?? null,
            ]);

            DB::commit();

            return redirect()->route('admin.book.index')
                ->with('success', 'Item berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


     public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::orderBy('cat_name', 'asc')->get();

        // Return the view to create a new item
        return view('admin.book.edit', compact('item','categories'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'price'         => 'required|numeric|min:0',
            'img'           => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active'     => 'required|boolean',

            // validasi item_details
            'file_path'     => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,zip,rar|max:10240',
            'video_url'     => 'nullable|url',
            'zoom_link'     => 'nullable|url',
            'event_date'    => 'nullable|date',
            'duration_days' => 'nullable|integer|min:1',
        ]);

        // Cari item
        $item = Item::findOrFail($id);

        // Handle image upload jika ada file baru
        if ($request->hasFile('img')) {
            $image = $request->file('img')->store('items', 'public');
            $validatedData['img'] = $image;
        }

        // Update tabel items
        $item->update([
            'name'        => $validatedData['name'],
            'description' => $validatedData['description'] ?? null,
            'price'       => $validatedData['price'],
            'img'         => $validatedData['img'] ?? $item->img,
            'is_active'   => $validatedData['is_active'],
        ]);

        // Update / Insert item_details
        $detailData = [
            'video_url'     => $validatedData['video_url'] ?? null,
            'zoom_link'     => $validatedData['zoom_link'] ?? null,
            'event_date'    => $validatedData['event_date'] ?? null,
            'duration_days' => $validatedData['duration_days'] ?? null,
        ];

        // kalau ada file baru untuk file_path
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('item_files', 'public');
            $detailData['file_path'] = $filePath;
        }

        // Update atau buat detail
        $item->detail()->updateOrCreate(
            ['item_id' => $item->id],
            $detailData
        );

        return redirect()->route('admin.book.index')->with('success', 'Item updated successfully.');
    }

     public function destroy(string $id)
    {
        // Find the item and delete it
        $item = Item::findOrFail($id);
        $item->delete();

        // Redirect to the items index with a success message
        return redirect()->route('admin.book.index')->with('success', 'Item deleted successfully.');
    }


    
}
