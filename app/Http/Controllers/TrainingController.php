<?php

namespace App\Http\Controllers;

use App\Models\ItemTraining;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        // Ambil semua data training dengan relasi detail-nya
        $trainings = ItemTraining::with('detail')->latest()->get();

        return view('product.pelatihan.in_house.in_house', compact('trainings'));
    }

    public function show($id)
    {
        $training = ItemTraining::with('detail')->findOrFail($id);

        return view('product.pelatihan.in_house.in_house_show', compact('training'));
    }
}
