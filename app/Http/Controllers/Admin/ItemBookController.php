<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ItemBookController extends Controller
{
    public function index() {
        // Fetch all items from the database
        $items = Item::orderBy('name', 'desc')->get();

        // Return the view with the items
        return view('admin.book.index', compact('items'));
    }

    public function create()
    {
        return view('admin.book.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // item
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|integer',
            'img'         => 'nullable|image|mimes:jpg,jpeg,png',
            'is_active'   => 'boolean',

            // ebook
            'file_type'   => 'required|in:upload,link',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:20480', // max 20MB
            'file_link'   => 'nullable|url',
        ]);

        DB::beginTransaction();
        try {
            // Upload gambar cover (jika ada)
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

            // Tentukan path ebook
            $filePath = null;
            if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
                $filePath = $request->file('file_upload')->store('ebooks', 'public');
            } elseif ($validated['file_type'] === 'link') {
                $filePath = $validated['file_link'];
            }

            // Simpan detail item
            ItemDetail::create([
                'item_id'   => $item->id,
                'file_path' => $filePath,
            ]);

            DB::commit();

            return redirect()->route('admin.book.index')
                ->with('success', 'E-Book berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        // Ambil book beserta detailnya
        $book = Item::with('detail')->findOrFail($id);

        return view('admin.book.show', compact('book'));
    }


    public function edit($id)
    {
        $book = Item::findOrFail($id);
        return view('admin.book.edit', compact('book'));
    }

   public function update(Request $request, $id)
{
    $validated = $request->validate([
        // item
        'name'        => 'required|string|max:255',
        'description' => 'nullable|string',
        'price'       => 'required|integer',
        'img'         => 'nullable|image|mimes:jpg,jpeg,png',
        'is_active'   => 'boolean',

        // ebook
        'file_type'   => 'required|in:upload,link',
        'file_upload' => 'nullable|file|mimes:pdf,doc,docx|max:20480', // max 20MB
        'file_link'   => 'nullable|url',
    ]);

    DB::beginTransaction();
    try {
        // Cari item
        $item = Item::findOrFail($id);

        // === Handle gambar cover ===
        $imgPath = $item->img; // default: gunakan gambar lama
        if ($request->hasFile('img')) {
            // hapus gambar lama jika ada
            if ($item->img && Storage::disk('public')->exists($item->img)) {
                Storage::disk('public')->delete($item->img);
            }
            // upload baru
            $imgPath = $request->file('img')->store('items', 'public');
        }

        // === Update data item ===
        $item->update([
            'name'        => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price'       => $validated['price'],
            'img'         => $imgPath,
            'is_active'   => $validated['is_active'] ?? 1,
        ]);

        // === Handle file ebook ===
        $detail = $item->detail; // relasi one-to-one

        $filePath = $detail->file_path ?? null;
        if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
            // hapus file lama jika upload baru
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file_upload')->store('ebooks', 'public');
        } elseif ($validated['file_type'] === 'link') {
            $filePath = $validated['file_link'];
        }

        // === Update atau buat item_detail ===
        $item->detail()->updateOrCreate(
            ['item_id' => $item->id],
            ['file_path' => $filePath]
        );

        DB::commit();

        return redirect()->route('admin.book.index')
            ->with('success', 'E-Book berhasil diperbarui.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => $e->getMessage()]);
    }
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
