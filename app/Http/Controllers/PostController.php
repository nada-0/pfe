<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Meetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'tags'])
            ->withCount('comments')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $popularTags = Tag::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $meetups = Meetup::orderBy('date', 'asc')->get();

        return view('posts.post', compact('posts', 'popularTags', 'meetups'));
    }

    public function create()
    {
        $tags = Tag::get();
        return view('posts.addPost',compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'postImage' => 'nullable|image',
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->content = $request->content;

        $post->tags()->attach($request->input('tags'));

        if ($request->hasFile('postImage')) {
            $imageName = time() . '.' . $request->postImage->extension();
            $request->postImage->move(public_path('images'), $imageName);
            $post->postImage = 'images/' . $imageName;
        }

        $post->save();

        return redirect()->route('posts.post')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $tags = Tag::get();
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }

        return view('posts.editPost', compact('post','tags'));
    }

    public function update(Request $request, Post $post)
{
    if ($post->user_id !== Auth::id()) {
        return redirect()->route('home')->with('error', 'Unauthorized access.');
    }

    $request->validate([
        'content' => 'required',
        'postImage' => 'nullable|image',
        'tags' => 'array'
    ]);

    $post->content = $request->content;

    if ($request->hasFile('postImage')) {
        $imageName = time() . '.' . $request->postImage->extension();
        $request->postImage->move(public_path('images'), $imageName);
        $post->postImage = 'images/' . $imageName;
    }

    $post->save();

    $post->tags()->detach();

    if ($request->has('tags')) {
        $post->tags()->attach($request->input('tags'));
    }

    return redirect()->route('posts.post')->with('success', 'Post updated successfully.');
}


    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }

        if ($post->postImage) {
            Storage::delete(public_path($post->postImage));
        }

        $post->delete();

        return redirect()->route('posts.post')->with('success', 'Post deleted successfully.');
    }

    public function like(Request $request, Post $post)
    {
        if ($request->ajax()) {
            $post->increment('likes');
            return response()->json(['success' => true, 'likes' => $post->likes]);
        }
        return response()->json(['success' => false]);
    }
}
