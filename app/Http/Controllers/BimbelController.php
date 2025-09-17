<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BimbelController extends Controller
{
    // Halaman utama e-learning / bimbel
    public function index()
    {
        // Contoh data kosong supaya tidak error
        $categories = []; 
        $courses = [];    

        return view('product.bimbel.bimbel', compact('categories', 'courses'));
    }

    // Halaman daftar kursus
    public function courses(Request $request)
    {
        // Ambil query string 'class' dari tombol
        $class = $request->query('class'); // 'A' atau 'B'

        // Contoh data dummy sesuai class (nanti bisa ganti dengan DB)
        // if ($class === 'A') $courses = Course::where('class', 'A')->get();
        // else $courses = Course::where('class', 'B')->get();
        $courses = []; // kosong dulu

        // kirim $class ke view supaya bisa tampil judul “Bimbel A” / “Bimbel B”
        return view('bimbel.courses.index', compact('class', 'courses'));
    }

    // Halaman detail kursus
    public function show($id)
    {
        // Ambil kursus berdasarkan id
        // $course = Course::findOrFail($id);

        return view('bimbel.courses.show'); 
    }

    // Proses pendaftaran kursus
    public function enroll(Request $request, $id)
    {
        // Proses logika mendaftar kursus
        // Cek login, simpan ke tabel pivot user_course dsb.

        return redirect()
            ->route('bimbel.courses.show', $id)
            ->with('success', 'Berhasil mendaftar kursus');
    }
}
