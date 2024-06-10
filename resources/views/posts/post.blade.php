@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="post-body">
        <div class="posts-page-container">
            <div class="posts-page-sidebar">
                <div class="posts-page-popular-tags">
                    <h3>Popular Tags</h3>
                    <ul>
                        @php $count = 0; @endphp
                        @foreach ($popularTags as $tag)
                            @if ($count < 5)
                                <li class="firstTag">#{{ $tag->name }}</li>
                                <li class="secondTag">{{ $tag->posts_count }} Posted by this tag</li>
                            @endif
                            @php $count++; @endphp
                        @endforeach
                    </ul>
                </div>
                <div class="posts-page-meetups">
                    <h3>Meetups</h3>
                    <ul>
                        @foreach ($meetups as $meetup)
                            <li>
                                <span class="meetups-date">{{ \Carbon\Carbon::parse($meetup->date)->format('M j') }}</span>
                                <div class="meetups-info">
                                    <span>{{ $meetup->name }}</span>
                                    <span>{{ $meetup->type }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="posts-page-content">
                @guest
                    <div class="posts-page-create-post">
                        <input type="text" id="search-query" placeholder="Search services...">
                    </div>
                @else
                    <div class="posts-page-create-post">
                        <img src="{{ Auth::user()->image }}" alt="" class="post-user-img">
                        <input type="text" id="search-query" placeholder="Search services...">
                        <a href="{{ route('posts.addPost') }}" class="post-btn">Create Post</a>
                    </div>
                @endguest
                @foreach ($posts as $post)
                    <div class="posts-page-post">
                        <div class="posts-page-post-content">
                            @if ($post->postImage)
                                <img src="{{ $post->postImage }}" alt="Post Image">
                            @endif
                        </div>
                        <div class="all-info">
                            <div class="option">
                                <p>{{ $post->content }}</p>
                                <div class="heart-option">
                                    <a href="#" class="like-button like-count heart-like"
                                        data-post-id="{{ $post->id }}">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                    @if (Auth::id() == $post->user_id)
                                        <div class="posts-page-dropdown">
                                            <button class="posts-page-dropbtn"><i
                                                    class="fa-solid fa-ellipsis-vertical"></i></button>
                                            <div class="posts-page-dropdown-content">
                                                <a href="{{ route('posts.editPost', $post) }}">Edit</a>
                                                <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this post?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="posts-page-post-tags">
                                @foreach ($post->tags as $tag)
                                    <span>{{ $tag->name }}</span>
                                @endforeach
                            </div>
                            <div class="all-likes">
                                <div class="posts-page-user-info">
                                    <div class="posts-page-user-info-img">
                                        <img src="{{ $post->user->image }}" alt="{{ $post->user->name }}">
                                        <span>{{ $post->user->name }}</span>
                                    </div>
                                    <div class="posts-page-user-info-date">
                                        <span>{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="posts-page-post-meta">
                                    {{-- <span>{{ $post->views }} Views</span> --}}
                                    <span>
                                        <span class="likes-count-{{ $post->id }}">{{ $post->likes }} Likes</span>
                                    </span>
                                    <span>
                                        <a href="{{ route('posts.comments', $post) }}" class="comment-button">
                                            <span>{{ $post->comments_count }} Comments</span>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="posts-page-pagination-links">
                    {{ $posts->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.like-button').click(function(e) {
                e.preventDefault();
                var postId = $(this).data('post-id');
                var likeCountSpan = $('.likes-count-' + postId);
                $.ajax({
                    url: '/posts/' + postId + '/like',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (response.success) {
                            likeCountSpan.text(response.likes + ' Likes');
                        }
                    }
                });
            });
        });
        $('#search-query').on('input', function() {
            var query = $(this).val();
            $.ajax({
                url: '{{ route('search') }}',
                method: 'GET',
                data: { query: query },
                success: function(data) {
                    var searchResults = '';
                    if (data.length > 0) {
                        data.forEach(function(service) {
                            searchResults += '<div class="search-result-item">';
                            searchResults += '<h3>' + service.name + '</h3>';
                            searchResults += '</div>';
                        });
                    } else {
                        searchResults = '<div>No results found</div>';
                    }
                    $('#posts-page-content').html(searchResults);
                }
            });
        });

    </script>
@endpush
