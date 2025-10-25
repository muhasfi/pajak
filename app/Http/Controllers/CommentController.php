<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('replies')->latest()->get();
        return view('customer.konsultasi.forum', compact('comments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'content' => 'required|string',
        ]);

        Comment::create($validated);

        return redirect()->back()->with('success', 'Komentar Anda berhasil dikirim dan menunggu persetujuan admin.');
    }
}
