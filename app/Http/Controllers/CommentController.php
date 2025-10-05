<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\CommentMail;
use Illuminate\Support\Facades\Mail;

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
        $comment -> user_id = auth() -> id();
        
        if ($comment -> save()) {
            Mail::to('fedor.tarasov.2007@mail.ru') -> send(new CommentMail($comment, $article -> id));
        };

        return redirect() -> back();
    }

    public function edit(Article $article, Comment $comment)
    {
        return view('comment/edit', ['article' => $article, 'comment' => $comment]);
    }

    public function update(Request $request, Article $article, Comment $comment)
    {
        $request -> validate([
            'text' => 'required|string|max:100',
        ]);

        $comment -> text = $request -> text;
        $comment -> save();

        return redirect()
        -> route('article.show', ['article' => $article -> id])
        -> with('message', 'Update successful');
    }

    public function destroy(Article $article, Comment $comment)
    {
        $comment -> delete();

        return redirect()
        -> route('article.show', ['article' => $article -> id])
        -> with('message', 'Delete successful');
    }
}
// return redirect() -> back();
