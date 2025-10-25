<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentAdminController extends Controller
{
    public function index()
    {
        // Ambil semua komentar + relasi balasan (replies)
        $comments = Comment::with('replies')->latest()->get();
        return view('admin.forum.index', compact('comments'));
    }

    public function approve(Comment $comment)
    {
        $comment->update(['approved' => true]);
        return redirect()->back()->with('success', 'Komentar berhasil disetujui.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }
}
