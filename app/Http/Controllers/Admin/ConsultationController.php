<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
     // Menampilkan daftar semua konsultasi
     public function index(): View
     {
         $consultations = Consultation::latest()->paginate(5);
         return view('admin.consultations.index', compact('consultations'));
     }
 
     // Menampilkan form untuk membuat konsultasi baru
     public function create(): View
     {
         return view('admin.consultations.create');
     }
 
     // Menyimpan konsultasi baru ke database
     public function store(Request $request): RedirectResponse
     {
         $request->validate([
             'judul' => 'required|max:255',
             'deskripsi' => 'required',
         ]);
         Consultation::create($request->all());
         return redirect()->route('consultations.index')
                         ->with('success', 'Konsultasi berhasil dibuat.');
     }
 
     // Menampilkan detail satu konsultasi
     public function show(Consultation $consultation): View
     {
         return view('admin.consultations.show', compact('consultation'));
     }
 
     // Menampilkan form untuk mengedit konsultasi
     public function edit(Consultation $consultation): View
     {
         return view('admin.consultations.edit', compact('consultation'));
     }
 
     // Memperbarui data konsultasi di database
     public function update(Request $request, Consultation $consultation): RedirectResponse
     {
         $request->validate([
             'judul' => 'required|max:255',
             'deskripsi' => 'required',
         ]);
         $consultation->update($request->all());
         return redirect()->route('consultations.index')
                         ->with('success', 'Konsultasi berhasil diupdate.');
     }
 
     // Menghapus konsultasi dari database
     public function destroy(Consultation $consultation): RedirectResponse
     {
         $consultation->delete();
         return redirect()->route('consultations.index')
                         ->with('success', 'Konsultasi berhasil dihapus.');
     }
}
