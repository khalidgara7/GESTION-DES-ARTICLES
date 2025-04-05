<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Article;

class CommentController extends Controller
{
public function index($article_Id)
    {
        return response()->json([
            'comments' => Article::findOrFail($article_Id)->comments
        ]);
    }

    public function store(Request $request, $article_Id)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $comment = Comment::create([
            'description' => $request->description
        ]);

        $article = Article::findOrFail($article_Id);
        $article->comments()->attach($comment->id);

        return response()->json([
            'message' => 'Comment created successfully',
            'comment' => $comment
        ]);
    }

    public function destroy($article_Id, $comment_Id)
    {
        $article = Article::findOrFail($article_Id);
        $article->comments()->detach($comment_Id);

        return response()->json([
            'message' => 'Comment deleted successfully'
        ]);
    }
}
