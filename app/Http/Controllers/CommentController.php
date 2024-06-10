<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        $comments = $post->comments;
        return view('posts.comments', compact('comments', 'post'));
    }

    public function create(Post $post)
    {
        return view('posts.addComment', compact('post'));
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->post_id = $post->id;
        $comment->user_id = Auth::id();
        $comment->save();

        return redirect()->route('posts.comments', ['post' => $post->id]);
    }
}
