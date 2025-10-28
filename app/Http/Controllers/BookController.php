<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class BookController extends Controller
{
    public function index()
    {
        $items = Item::where('is_active', 1)
            ->orderBy('name', 'asc')
            ->paginate(10);

        return view('product.book.book', compact('items'));
    }

    public function show($id)
    {
        $item = Item::with('detail')->findOrFail($id);

        return view('product.book.show', compact('item'));
    }
    
}
