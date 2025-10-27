<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        // Ambil hanya komentar utama (tanpa parent), include relasi replies
        $comments = Comment::whereNull('parent_id')
            ->with('replies')
            ->latest()
            ->get();

        return view('product.konsultasi.forum', compact('comments'));
    }

    /**
     * Simpan komentar baru atau balasan
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content'   => 'required|string|max:2000',
            'parent_id' => 'nullable|exists:comments,id',
            'name'      => 'nullable|string|max:100',
            'email'     => 'nullable|email|max:150',
        ]);

        $comment = new Comment();
        $comment->content = $validated['content'];
        $comment->parent_id = $validated['parent_id'] ?? null;

        // Jika user login
        if (auth()->check()) {
            $comment->user_id = auth()->id();
            $comment->name = auth()->user()->name;
            $comment->email = auth()->user()->email ?? null;
        } else {
            // Jika guest (tidak login)
            $comment->name = $validated['name'] ?? 'Anonim';
            $comment->email = $validated['email'] ?? null;
        }

        $comment->save();

        return back()->with('success', 'Komentar berhasil dikirim!');
    }

    /**
     * Hanya admin (atau user login tertentu) yang bisa hapus — opsional
     */
    public function destroy(Comment $comment)
    {
        if (auth()->check()) {
            // Jika user yang login adalah pemilik komentar atau admin
            if (auth()->id() === $comment->user_id) {
                $comment->delete();
                return back()->with('success', 'Komentar berhasil dihapus!');
            }
        }

        return back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
    }

    public function reply(Request $request, $parentId)
{
    $request->validate([
        'content' => 'required|string',
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
    ]);

    $comment = new Comment();
    $comment->parent_id = $parentId;
    $comment->content = $request->content;

    if (auth()->check()) {
        $comment->user_id = auth()->id();
        $comment->name = auth()->user()->name;
        $comment->email = auth()->user()->email;
    } else {
        $comment->name = $request->name;
        $comment->email = $request->email;
    }

    $comment->save();

    return back()->with('success', 'Balasan berhasil dikirim!');
}

}