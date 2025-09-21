<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request -> validate([
            'text' => 'required|string|max:100',
        ]);

        $comment = new Comment;

        $comment -> text = $request -> text;
        $comment -> article_id = $article -> id;
        
        $comment -> save();

        return redirect() -> back();
    }
}
