<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryPaper;
use App\Models\ItemPaper;
use App\Models\ItemPaperDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemPaperController extends Controller
{
    // Fetch all items from the database
    public function index(Request $request)
    {
        // Ambil semua kategori untuk dropdown
        $categories = CategoryPaper::all();

        // Query paper
        $papers = ItemPaper::with('categoryPaper')
            ->when($request->category_id, function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })
            ->orderBy('name', 'asc')
            ->get();

        return view('admin.paper.index', compact('papers', 'categories'));
    }


    public function create()
    {
        $categories = CategoryPaper::all();
        return view('admin.paper.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required',
            'price'       => 'required|integer',
            'category_id' => 'nullable|exists:category_papers,id',
            'img'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'details.*'   => 'nullable|file|mimes:pdf,doc,docx,xlsx,csv,ppt,pptx,jpg,jpeg,png|max:4096',
        ]);

        // Simpan data utama item_papers
        $paper = new ItemPaper();
        $paper->name        = $request->name;
        $paper->description = $request->description;
        $paper->price       = $request->price;
        $paper->category_id = $request->category_id;

        // Upload gambar utama
        if ($request->hasFile('img')) {
            $paper->img = $request->file('img')->store('papers/img', 'public');
        }

        $paper->save();

        // Upload file detail ke item_paper_details
        if ($request->hasFile('details')) {
            foreach ($request->file('details') as $file) {
                $path = $file->store('papers/details', 'public');
                ItemPaperDetail::create([
                    'paper_id'  => $paper->id,
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.paper.index')->with('success', 'Item Paper berhasil ditambahkan');
    }

    // Controller Methods

    public function edit($id)
    {
        $paper = ItemPaper::with('detailPaper')->findOrFail($id);
        $categories = CategoryPaper::all();
        return view('admin.paper.edit', compact('paper', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required',
            'price'       => 'required|integer',
            'category_id' => 'nullable|exists:category_papers,id',
            'img'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'details.*'   => 'nullable|file|mimes:pdf,doc,docx,xlsx,csv,ppt,pptx,jpg,jpeg,png|max:4096',
            'delete_details' => 'nullable|array',
            'delete_details.*' => 'exists:item_paper_details,id',
        ]);

        $paper = ItemPaper::findOrFail($id);
        
        // Update data utama
        $paper->name        = $request->name;
        $paper->description = $request->description;
        $paper->price       = $request->price;
        $paper->category_id = $request->category_id;
        $paper->is_active   = $request->is_active ?? 1;

        // Upload gambar baru jika ada
        if ($request->hasFile('img')) {
            // Hapus gambar lama jika ada
            if ($paper->img && Storage::disk('public')->exists($paper->img)) {
                Storage::disk('public')->delete($paper->img);
            }
            $paper->img = $request->file('img')->store('papers/img', 'public');
        }

        $paper->save();

        // Hapus file detail yang dipilih untuk dihapus
        if ($request->has('delete_details')) {
            foreach ($request->delete_details as $detailId) {
                $detail = ItemPaperDetail::find($detailId);
                if ($detail && $detail->paper_id == $paper->id) {
                    // Hapus file dari storage
                    if (Storage::disk('public')->exists($detail->file_path)) {
                        Storage::disk('public')->delete($detail->file_path);
                    }
                    $detail->delete();
                }
            }
        }

        // Upload file detail baru jika ada
        if ($request->hasFile('details')) {
            foreach ($request->file('details') as $file) {
                $path = $file->store('papers/details', 'public');
                ItemPaperDetail::create([
                    'paper_id'  => $paper->id,
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.paper.index')->with('success', 'Item Paper berhasil diupdate');
    }

    public function destroy($id)
    {
        $paper = ItemPaper::with('detailPaper')->findOrFail($id);

        // Hapus file gambar utama jika ada
        if ($paper->img && Storage::exists('public/'.$paper->img)) {
            Storage::delete('public/'.$paper->img);
        }

        // Hapus file lampiran detail jika ada
        if ($paper->detailPaper) {
            if ($paper->detailPaper->file_path && Storage::exists('public/'.$paper->detailPaper->file_path)) {
                Storage::delete('public/'.$paper->detailPaper->file_path);
            }
            // Hapus record detailPaper
            $paper->detailPaper->delete();
        }

        // Hapus record utama paper
        $paper->delete();

        return redirect()->route('admin.paper.index')
            ->with('success', 'Kertas Kerja berhasil dihapus');
    }


}
