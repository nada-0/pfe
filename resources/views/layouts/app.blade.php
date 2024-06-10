<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bricolage: @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2/css/all.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/allCard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/latest.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/littleCard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/separate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/TypeCard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/need.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <link href="{{ asset('assets/css/services.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/editService.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/post.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/comments.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/addPost.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/calender.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/editMeet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/updateMeet.css') }}">
</head>

<body>
    @php
        $isAuthPage = request()->is('register') || request()->is('login');
        $isServicePage = request()->route()->getName() === 'services.show';
        // $isAddPostPage = request()->route()->getName() !== 'posts.addPost';
        // $isEditPostPage = request()->route()->getName() === 'posts.editPost';
    @endphp
    @if (!$isAuthPage)
        <header>
            <nav class="all">
                <a href="{{ url('/') }}" class="brand">Bricolage</a>
                <div class="allContent">
                    <div class="all-icons">
                        <a href="{{ url('/') }}" class="icon"><i class="fa-solid fa-house"></i></a>
                        <a href="{{ route('services.service') }}" class="icon"><i
                                class="fa-solid fa-screwdriver-wrench"></i></a>
                        <a href="{{ route('posts.post') }}" class="icon"><i class="fa-solid fa-newspaper"></i></a>
                    </div>
                    <div class="search">
                        <input class="form-control me-2 inputSearch" type="search" placeholder="Type here to search..."
                            aria-label="Search">
                        <i class="fa-solid fa-magnifying-glass iconSearch"></i>
                    </div>
                </div>
                <div class="button-group">
                    @guest
                        <a href="{{ route('login') }}" class="btn sign">Sign in</a>
                        <a href="{{ route('register') }}" class="btn sign">Sign up</a>
                    @else
                        {{-- <div class="nav-item dropdown notification">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-bell"></i><span
                                    class="badge badge-light">{{ Auth::user()->unreadNotifications->count() }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @forelse (Auth::user()->unreadNotifications as $notification)
                                    <a class="dropdown-item" href="#">
                                        {{ $notification->data['name'] }} is {{ $notification->data['type'] }} now.
                                    </a>
                                @empty
                                    <a class="dropdown-item" href="#">No new notifications</a>
                                @endforelse
                            </div>
                        </div> --}}
                        <div class="btn-group" role="group">
                            <a href="{{ route('profiles.profile') }}" class="btn sign">
                                @if (Auth::user()->image)
                                    <img src="{{ Auth::user()->image }}" alt="" class="profile-img">
                                @else
                                    <i class="fas fa-user"></i>
                                @endif
                                <span class="user-name">{{ Auth::user()->name }}</span>
                            </a>
                        </div>
                    @endguest
                </div>
            </nav>
        </header>
    @endif
    <main>
        @yield('content')
    </main>
    @if (
        !$isAuthPage &&
            !$isServicePage &&
            request()->route()->getName() !== 'posts.addPost' &&
            request()->route()->getName() !== 'posts.editPost' &&
            request()->route()->getName() !== 'meetups.show' &&
            request()->route()->getName() !== 'meetups.edit' &&
            request()->route()->getName() !== 'posts.comments')
        <footer>
            <div class="footer">
                <div class="col">
                    Copyright © 2024.
                </div>
                <div class="col">
                    <ul class="nav all-footers-name">
                        <li class="nav-item">
                            <a class="nav-link footer-name" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link footer-name" href="{{ route('services.service') }}">Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link footer-name">Posts</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    @endif

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @stack('scripts')
</body>

</html>
