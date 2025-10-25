<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Models\Comment;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        $request->validate(['content' => 'required|string']);

        $comment->replies()->create([
            'content' => $request->content,
            'admin_name' => 'Admin Support',
        ]);

        return redirect()->back()->with('success', 'Balasan berhasil ditambahkan.');
    }

    public function edit(Reply $reply)
    {
        return view('admin.forum.edit', compact('reply'));
    }

    public function update(Request $request, Reply $reply)
    {
        $request->validate(['content' => 'required|string']);
        $reply->update(['content' => $request->content]);
        return redirect()->route('admin.comments')->with('success', 'Balasan berhasil diperbarui.');
    }

    public function destroy(Reply $reply)
    {
        $reply->delete();
        return redirect()->back()->with('success', 'Balasan berhasil dihapus.');
    }
}

