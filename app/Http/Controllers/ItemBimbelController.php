<?php

// app/Http/Controllers/Customer/ItemBimbelController.php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ItemBimbel;

class ItemBimbelController extends Controller
{
    public function index() {
        $items = ItemBimbel::where('is_active', true)->get();
        return view('customer.item_bimbel.index', compact('items'));
    }

    public function show(ItemBimbel $item_bimbel) {
        if (!$item_bimbel->is_active) {
            abort(404);
        }
        return view('customer.item_bimbel.show', compact('item_bimbel'));
    }
}

