<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\TrainingDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource
     */
    public function index(): View
    {
        $trainings = Training::with('detail')->latest()->paginate(10);
        return view('admin.trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource
     */
    public function create(): View
    {
        return view('admin.trainings.create');
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
                $gambarPath = $request->file('gambar')->store('trainings', 'public');
            }

            // Simpan training
            $training = Training::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal,
                'harga' => $request->harga,
                'gambar' => $gambarPath
            ]);

            // Simpan detail training
            TrainingDetail::create([
                'training_id' => $training->id,
                'materi' => $request->materi,
                'instruktur' => $request->instruktur,
                'durasi_jam' => $request->durasi_jam,
                'tempat' => $request->tempat,
                'kuota_peserta' => $request->kuota_peserta,
                'peralatan_dibutuhkan' => $request->peralatan_dibutuhkan
            ]);

            return redirect()->route('trainings.index')
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
    public function show(Training $training): View
    {
        $training->load('detail');
        return view('trainings.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource
     */
    public function edit(Training $training): View
    {
        $training->load('detail');
        return view('admin.trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage
     */
    public function update(Request $request, Training $training)
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
                $gambarPath = $request->file('gambar')->store('trainings', 'public');
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

            return redirect()->route('trainings.index')
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
    public function destroy(Training $training)
    {
        try {
            // Hapus gambar jika ada
            if ($training->gambar) {
                Storage::disk('public')->delete($training->gambar);
            }
            
            $training->delete();
            
            return redirect()->route('trainings.index')
                ->with('success', 'Training berhasil dihapus!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}