<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.product.artikel.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.product.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('articles', 'public');
            $data['img'] = $imagePath;
        }

        $data['is_active'] = $request->has('is_active');

        Article::create($data);

        return redirect()->route('admin.product.artikel.index')
            ->with('success', 'Artikel berhasil dibuat.');
    }

    public function show(Article $article)
    {
        // Ambil artikel terkait (kecuali artikel yang sedang dilihat)
        $relatedArticles = Article::where('id', '!=', $article->id)
            ->where('is_active', true)
            ->inRandomOrder()
            ->limit(4)
            ->get();
            
        return view('admin.product.artikel.show', compact('article', 'relatedArticles'));
    }

    public function edit(Article $article)
    {
        return view('admin.product.artikel.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('img')) {
            // Hapus gambar lama jika ada
            if ($article->img) {
                Storage::disk('public')->delete($article->img);
            }
            
            $imagePath = $request->file('img')->store('articles', 'public');
            $data['img'] = $imagePath;
        }

        $data['is_active'] = $request->has('is_active');

        $article->update($data);

        return redirect()->route('admin.product.artikel.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        // Hapus gambar jika ada
        if ($article->img) {
            Storage::disk('public')->delete($article->img);
        }
        
        $article->delete();

        return redirect()->route('admin.product.artikel.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
    
    // Tampilan customer - daftar artikel
    public function customerIndex()
    {
        $articles = Article::where('is_active', true)->get();
        return view('admin.product.artikel.index', compact('articles'));
    }
    
}