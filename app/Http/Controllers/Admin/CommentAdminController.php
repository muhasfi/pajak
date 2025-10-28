<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentAdminController extends Controller
{
    /**
     * Tampilkan semua komentar user untuk dibalas di panel admin
     */
    public function index()
    {
        $comments = Comment::whereNull('parent_id')
            ->with('replies')
            ->latest()
            ->get();

        return view('admin.forum.index', compact('comments'));
    }

    /**
     * Balas komentar user
     */
    public function reply(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $parent = Comment::findOrFail($id);

        Comment::create([
            'parent_id' => $parent->id,
            'admin_id' => Auth::guard('admin')->id(),
            'name' => Auth::guard('admin')->user()->name ?? 'Admin',
            'email' => Auth::guard('admin')->user()->email ?? null,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Balasan berhasil dikirim.');
    }

    /**
     * Admin hapus komentar / balasan
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back()->with('success', 'Komentar atau balasan berhasil dihapus.');
    }

    /**
     * Admin edit komentar (biasanya untuk balasannya sendiri)
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        // Pastikan admin hanya bisa edit komentarnya sendiri
        if ($comment->admin_id !== Auth::guard('admin')->id()) {
            return redirect()->back()->with('error', 'Anda tidak dapat mengedit komentar orang lain.');
        }

        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment->update([
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil diperbarui.');
    }
}