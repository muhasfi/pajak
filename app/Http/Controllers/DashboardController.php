<?php

namespace App\Http\Controllers;

use App\Models\ItemBimbel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems = ItemBimbel::count();
        $activeItems = ItemBimbel::where('is_active', true)->count();
        
        return view('admin.dashboard', compact('totalItems', 'activeItems'));
    }
}