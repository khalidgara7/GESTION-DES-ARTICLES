<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $article = new Article();
        $article->name = $request->name;
        $article->description = $request->description;
        $article->category_id = 1;
        $article->save();
        return to_route('article.index');
    }

    public function show(string $id)
    {
        $article = Article::find($id);
        return view('articles.show', [
            'article' => $article
        ]);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:4'],
            'description' => 'required|min:4',
        ]) ;
        $category = Article::find($id);
        $category->update($data);
        return to_route('article.index');
    }


    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return to_route('article.index');
    }
}
