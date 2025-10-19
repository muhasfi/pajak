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

        return view('product.pelatihan.in_house', compact('trainings'));
    }
}
