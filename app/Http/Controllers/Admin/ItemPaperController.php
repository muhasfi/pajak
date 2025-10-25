<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryPaper;
use App\Models\ItemPaper;
use App\Models\ItemPaperDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        // Debug: uncomment untuk melihat data yang masuk
        // dd($request->all());

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'kebutuhan'   => 'nullable|string|max:255',
            'price'       => 'required|integer|min:0',
            'category_id' => 'required|exists:category_papers,id',
            'img'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file_type'   => 'required|in:upload,link',
            'file_upload' => 'required_if:file_type,upload|nullable|file|mimes:pdf,doc,docx|max:20480',
            'file_link'   => 'required_if:file_type,link|nullable|url|max:500',
            'details.*'   => 'nullable|file|mimes:pdf,doc,docx,xlsx,csv,ppt,pptx,jpg,jpeg,png|max:4096',
            'is_active'   => 'nullable|boolean',
        ]);

        DB::beginTransaction();
        try {
            // Upload gambar utama (jika ada)
            $imgPath = null;
            if ($request->hasFile('img')) {
                $imgPath = $request->file('img')->store('papers/img', 'public');
            }

            // Simpan data utama ke item_papers
            $paper = ItemPaper::create([
                'name'        => $validated['name'],
                'description' => $validated['description'],
                'kebutuhan'   => $validated['kebutuhan'],
                'price'       => $validated['price'],
                'category_id' => $validated['category_id'],
                'img'         => $imgPath,
                'is_active'   => $request->has('is_active') ? $validated['is_active'] : 1,
            ]);

            // Tentukan path file utama (ebook/link)
            $filePath = null;
            $isLink = false;

            if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
                $filePath = $request->file('file_upload')->store('papers/files', 'public');
                $isLink = false;
            } elseif ($validated['file_type'] === 'link' && $request->filled('file_link')) {
                $filePath = $validated['file_link'];
                $isLink = true;
            }

            // Simpan file utama ke item_paper_details
            if ($filePath) {
                ItemPaperDetail::create([
                    'paper_id'  => $paper->id,
                    'file_path' => $filePath,
                    'is_link'   => $isLink,
                ]);
            }

            // Upload file tambahan dari details[] jika ada
            if ($request->hasFile('details')) {
                foreach ($request->file('details') as $file) {
                    $detailPath = $file->store('papers/details', 'public');
                    ItemPaperDetail::create([
                        'paper_id'  => $paper->id,
                        'file_path' => $detailPath,
                        'is_link'   => false,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('admin.paper.index')
                ->with('success', 'Item Paper berhasil ditambahkan!');
                
        } catch (\Exception $e) {
            DB::rollBack();
            
            // // Log error untuk debugging
            // Log::error('Error saat menyimpan paper: ' . $e->getMessage());
            
            return back()
                ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])
                ->withInput();
        }
    }

    // Controller Methods

    public function edit($id)
    {
        $paper = ItemPaper::with('detail')->findOrFail($id);
        $categories = CategoryPaper::all();
        return view('admin.paper.edit', compact('paper', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'kebutuhan'   => 'nullable|string|max:255',
            'price'       => 'required|integer|min:0',
            'category_id' => 'required|exists:category_papers,id',
            'img'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file_type'   => 'required|in:upload,link',
            'file_upload' => 'required_if:file_type,upload|nullable|file|mimes:pdf,doc,docx|max:20480',
            'file_link'   => 'required_if:file_type,link|nullable|url|max:500',
            'details.*'   => 'nullable|file|mimes:pdf,doc,docx,xlsx,csv,ppt,pptx,jpg,jpeg,png|max:4096',
            'is_active'   => 'nullable|boolean',
        ]);

        DB::beginTransaction();
        try {
            $paper = ItemPaper::findOrFail($id);

            // 🔹 Update gambar utama jika diupload baru
            if ($request->hasFile('img')) {
                // Hapus gambar lama jika ada
                if ($paper->img && Storage::disk('public')->exists($paper->img)) {
                    Storage::disk('public')->delete($paper->img);
                }
                $paper->img = $request->file('img')->store('papers/img', 'public');
            }

            // 🔹 Update data utama
            $paper->update([
                'name'        => $validated['name'],
                'description' => $validated['description'],
                'kebutuhan'   => $validated['kebutuhan'] ?? null,
                'price'       => $validated['price'],
                'category_id' => $validated['category_id'],
                'is_active'   => $request->has('is_active') ? $validated['is_active'] : $paper->is_active,
            ]);

            // 🔹 Tentukan file utama (upload/link)
            $filePath = null;
            $isLink = false;

            if ($validated['file_type'] === 'upload' && $request->hasFile('file_upload')) {
                $filePath = $request->file('file_upload')->store('papers/files', 'public');
                $isLink = false;
            } elseif ($validated['file_type'] === 'link' && $request->filled('file_link')) {
                $filePath = $validated['file_link'];
                $isLink = true;
            }

            // 🔹 Update atau buat file utama di ItemPaperDetail
            if ($filePath) {
                // Cari file utama pertama (yang bukan dari details tambahan)
                $mainDetail = ItemPaperDetail::where('paper_id', $paper->id)->first();

                if ($mainDetail) {
                    // Jika file lama upload, hapus dari storage
                    if (!$mainDetail->is_link && Storage::disk('public')->exists($mainDetail->file_path)) {
                        Storage::disk('public')->delete($mainDetail->file_path);
                    }

                    $mainDetail->update([
                        'file_path' => $filePath,
                        'is_link'   => $isLink,
                    ]);
                } else {
                    ItemPaperDetail::create([
                        'paper_id'  => $paper->id,
                        'file_path' => $filePath,
                        'is_link'   => $isLink,
                    ]);
                }
            }

            // 🔹 Upload file tambahan baru jika ada
            if ($request->hasFile('details')) {
                foreach ($request->file('details') as $file) {
                    $detailPath = $file->store('papers/details', 'public');
                    ItemPaperDetail::create([
                        'paper_id'  => $paper->id,
                        'file_path' => $detailPath,
                        'is_link'   => false,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('admin.paper.index')
                ->with('success', 'Item Paper berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saat memperbarui paper: ' . $e->getMessage());
            return back()
                ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $paper = ItemPaper::findOrFail($id);

            // Hapus gambar utama jika ada
            if ($paper->img && Storage::disk('public')->exists($paper->img)) {
                Storage::disk('public')->delete($paper->img);
            }

            // Ambil semua detail terkait
            $details = ItemPaperDetail::where('paper_id', $paper->id)->get();

            foreach ($details as $detail) {
                // Hapus file jika bukan link
                if (!$detail->is_link && Storage::disk('public')->exists($detail->file_path)) {
                    Storage::disk('public')->delete($detail->file_path);
                }
                // Hapus record detail
                $detail->delete();
            }

            // Hapus record paper
            $paper->delete();

            DB::commit();

            return redirect()->route('admin.paper.index')
                ->with('success', 'Item Paper berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saat menghapus paper: ' . $e->getMessage());
            return back()
                ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }


}
