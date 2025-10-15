<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemTraining;
use App\Models\ItemTrainingDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemTrainingController extends Controller
{
    /**
     * Display a listing of the resource
     */
    public function index(): View
    {       
        $trainings = ItemTraining::with('detail')->latest()->paginate(10);
        return view('admin.training.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource
     */
    public function create(): View
    {
        return view('admin.training.create');
    }

    /**
     * Store a newly created resource in storage
     */
        public function store(Request $request)
        {
            $request->validate([
                'judul' => 'required|max:255',
                'deskripsi' => 'required',
                'tanggal' => 'required|date',
                'harga' => 'required|numeric',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'materi' => 'required',
                'instruktur' => 'required',
                'durasi_jam' => 'required|integer',
                'tempat' => 'required',
                'kuota_peserta' => 'required|integer'
            ]);

            try {
                // Upload gambar jika ada
                $gambarPath = null;
                if ($request->hasFile('gambar')) {
                    $gambarPath = $request->file('gambar')->store('training', 'public');
                }

                // Simpan training
                $training = ItemTraining::create([
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'tanggal' => $request->tanggal,
                    'harga' => $request->harga,
                    'gambar' => $gambarPath
                ]);

                // Simpan detail training
                ItemTrainingDetail::create([
                    'training_id' => $training->id,
                    'materi' => $request->materi,
                    'instruktur' => $request->instruktur,
                    'durasi_jam' => $request->durasi_jam,
                    'tempat' => $request->tempat,
                    'kuota_peserta' => $request->kuota_peserta,
                    'peralatan_dibutuhkan' => $request->peralatan_dibutuhkan
                ]);

                return redirect()->route('admin.training.index')
                    ->with('success', 'Training berhasil ditambahkan!');

            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                    ->withInput();
            }
        }
    /**
     * Display the specified resource
     */
    public function show(ItemTraining $training): View
    {
        $training->load('detail');
        return view('admin.training.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource
     */
    public function edit(ItemTraining $training): View
    {
        $training->load('detail');
        return view('admin.training.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage
     */
    public function update(Request $request, ItemTraining $training)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'materi' => 'required',
            'instruktur' => 'required',
            'durasi_jam' => 'required|integer',
            'tempat' => 'required',
            'kuota_peserta' => 'required|integer'
        ]);

        try {
            // Handle gambar
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($training->gambar) {
                    Storage::disk('public')->delete($training->gambar);
                }
                $gambarPath = $request->file('gambar')->store('training', 'public');
                $training->gambar = $gambarPath;
            }

            // Handle hapus gambar
            if ($request->has('hapus_gambar') && $training->gambar) {
                Storage::disk('public')->delete($training->gambar);
                $training->gambar = null;
            }

            // Update training
            $training->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal,
                'harga' => $request->harga
            ]);

            // Update detail training
            $training->detail->update([
                'materi' => $request->materi,
                'instruktur' => $request->instruktur,
                'durasi_jam' => $request->durasi_jam,
                'tempat' => $request->tempat,
                'kuota_peserta' => $request->kuota_peserta,
                'peralatan_dibutuhkan' => $request->peralatan_dibutuhkan
            ]);

            return redirect()->route('admin.training.index')
                ->with('success', 'Training berhasil diupdate!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }
    /**
     * Remove the specified resource from storage
     */
    public function destroy(ItemTraining $training)
    {
        try {
            // Hapus gambar jika ada
            if ($training->gambar) {
                Storage::disk('public')->delete($training->gambar);
            }
            
            $training->delete();
            
            return redirect()->route('admin.training.index')
                ->with('success', 'Training berhasil dihapus!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}