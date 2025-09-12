<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BimbelController extends Controller
{
    // Halaman utama e-learning / bimbel
 public function index()
{
    $categories = []; // Kosong, agar tidak error
    $courses = [];    // Kosong, agar tidak error

    return view('bimbel.bimbel', compact('categories', 'courses'));
}

    // Halaman daftar kursus
    public function courses(Request $request)
    {
        // Contoh: pakai pagination atau filter
        // $courses = Course::paginate(12);

        return view('bimbel.courses.index'); // resources/views/bimbel/courses/index.blade.php
    }

    // Halaman detail kursus
    public function show($id)
    {
        // Ambil kursus berdasarkan id
        // $course = Course::findOrFail($id);

        return view('bimbel.courses.show'); // resources/views/bimbel/courses/show.blade.php
    }

    // Proses pendaftaran kursus
    public function enroll(Request $request, $id)
    {
        // Proses logika mendaftar kursus
        // Cek login, simpan ke tabel pivot user_course dsb.
        
        return redirect()->route('bimbel.courses.show', $id)
            ->with('success', 'Berhasil mendaftar kursus');
    }
}
