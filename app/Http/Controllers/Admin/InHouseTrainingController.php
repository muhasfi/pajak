<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InHouseTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InHouseTrainingController extends Controller
{
    public function index()
    {
        $trainings = InHouseTraining::orderBy('tanggal', 'desc')->paginate(10);
        return view('admin.in_house_trainings.index', compact('trainings'));
    }

    public function create()
    {
        return view('admin.in_house_trainings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'gambar' => 'nullable|image|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'harga' => 'required|numeric|min:0',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('in_house_trainings', 'public');
            $data['gambar'] = $path;
        }

        InHouseTraining::create($data);

        return redirect()->route('in_house_trainings.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show(InHouseTraining $in_house_training)
    {
        return view('in_house_trainings.show', ['training' => $in_house_training]);
    }

    public function edit(InHouseTraining $in_house_training)
    {
        return view('admin.in_house_trainings.edit', ['training' => $in_house_training]);
    }

    public function update(Request $request, InHouseTraining $in_house_training)
    {
        $data = $request->validate([
            'gambar' => 'nullable|image|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'harga' => 'required|numeric|min:0',
        ]);

        if ($request->hasFile('gambar')) {
            // hapus file lama jika ada
            if ($in_house_training->gambar && Storage::disk('public')->exists($in_house_training->gambar)) {
                Storage::disk('public')->delete($in_house_training->gambar);
            }
            $path = $request->file('gambar')->store('in_house_trainings', 'public');
            $data['gambar'] = $path;
        }

        $in_house_training->update($data);

        return redirect()->route('in_house_trainings.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(InHouseTraining $in_house_training)
    {
        if ($in_house_training->gambar && Storage::disk('public')->exists($in_house_training->gambar)) {
            Storage::disk('public')->delete($in_house_training->gambar);
        }

        $in_house_training->delete();

        return redirect()->route('in_house_trainings.index')->with('success', 'Data berhasil dihapus.');
    }
}
