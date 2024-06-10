<!-- comments.blade.php -->
@extends('layouts.app')

@section('title', 'Post Comments')

@section('content')
    <div class="post-comments">
        <h2>Comments for Post "{{ $post->title }}"</h2>

        <div class="existing-comments">
            @forelse ($post->comments as $comment)
                <div class="comment">
                    <div class="comment-user-info">
                        <img src="{{ $comment->user->image }}" alt="{{ $comment->user->name }}" class="user-avatar">
                    </div>
                    <p>{{ $comment->content }}</p>
                </div>
            @empty
                <p class="no-comments">No comments yet.</p>
            @endforelse
        </div>

        @auth
            <form action="{{ route('comments.store', $post) }}" method="POST" class="add-comment-form">
                @csrf
                <textarea name="content" placeholder="Add your comment..." class="comment-textarea"></textarea>
                <button type="submit" class="post-comment-btn">Post Comment</button>
                <a href="{{ route('posts.post')}}" class="cancel-comment-btn">Cancel</a>
            </form>
        @else
            <p>Please <a href="{{ route('login') }}" class="login-link">login</a> to add a comment.</p>
        @endauth
    </div>
@endsection
