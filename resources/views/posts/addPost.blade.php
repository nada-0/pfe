@extends('layouts.app')
@section('title', 'Add Post')
@section('content')
<div class="create-post-container">
    <h2 class="create-post-title">Create Post</h2>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="create-post-form">
        @csrf
        <div class="form-group">
            <label for="content" class="form-label">Content:</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content') }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tag" class="form-label">Tags:</label>
            <select name="tags[]" id="tag" class="form-control" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ isset($post) && $post->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="postImage" class="form-label">Image:</label>
            <input type="file" name="postImage" id="postImage" class="form-control">
            @error('postImage')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn create-post-btn">Create Post</button>
    </form>
</div>
@endsection
