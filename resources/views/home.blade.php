<!-- resources/views/yourview.blade.php -->
@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="App">
        <div class="App-header">
            <h1>Find the right freelance service, one click.</h1>
        </div>
        <div class="search-box">
            <input class="search1" type="text" id="search-input" placeholder="Search for any service ..." />
            <button type="submit" id="search-button">
                <i class="fas fa-magnifying-glass icon-search"></i>
            </button>
        </div>
    </div>
    <div class="all-card">
        <div class="card">
            <span><i class="fas fa-house"></i></span>
            <h1>Qualified service provider</h1>
            <p>Each service is provided by verified, monitored, and evaluated
                providers to ensure you a superior quality experience.</p>
        </div>
        <div class="card">
            <span><i class="fas fa-id-card"></i></span>
            <h1>Services provided under supervision.</h1>
            <p>Each service is provided by verified, monitored, and evaluated
                providers to ensure you a superior quality experience.</p>
        </div>
    </div>
    <div class="separate">
        <p>Locate your employee profile in just a few moments</p>
    </div>
    <div class="littleCards">
        @foreach ($mainCategories as $index => $category)
            <div class="littleCard" style="background-image: url('/assets/images/{{ $category->img }}')">
                <a href="{{ url('/services') }}" class="titleCard">{{ $category->name }}</a>
            </div>
        @endforeach
        @if ($moreCategories->isNotEmpty())
            <div class="littleCard seeMore">
                <a href="{{ url('/services') }}" class="titleCard">See more</a>
            </div>
        @endif
    </div>
    <div class="allWorker">
        <div class="worker">
            <div class="over">
                <h1>Over <span class="num">+7000</span> worker profile</h1>
                <p>Find the best worker for your project. Our platform connects you with top-rated professionals across
                    various fields, ensuring you have access to the skills and expertise you need to succeed. Whether you're
                    looking for a developer, designer, writer, or any other specialist, we provide detailed profiles,
                    ratings, and reviews to help you make an informed decision. Start your project with confidence, knowing
                    you have the right person for the job.</p>
            </div>
            <div class="profil">
                @if ($users)
                    <div class="profile-cards-container AllCard">
                        @foreach ($users as $user)
                            <div class="user-card">
                                <div class="section1">
                                    <img src="{{ $user->image }}" alt="{{ $user->name }}" />
                                    <div class="all-link">
                                        <a class='link-to1' href="#">View Profile</a>
                                        <a class='link-to2' href="#">Call him</a>
                                    </div>
                                </div>
                                <div class="section2">
                                    <div class="special-indicator">Specialist</div>
                                    <div class="details">
                                        <h2>{{ $user->name }}
                                            <i class="fa-solid fa-circle-check"></i>
                                        </h2>
                                        <span class='stars'>
                                            @include('star_rating', ['rating' => $user->rating])
                                        </span>
                                        <div class="more">
                                            <p>{{ $user->priceWork }} Mad/hr</p>
                                            <div class="location">
                                                <i class="fas fa-map-marker-alt locationIcon"></i>
                                                <p>{{ $user->location }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="categories">
                                        @foreach ($user->categories->slice(0, 3) as $category)
                                            <span>{{ $category->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div>Error: Failed to fetch users</div>
                @endif
            </div>
        </div>
    </div>
    <div class="allNeed">
        <div class="need">
            <div class="dote"></div>
            <div class="click">
                <h1>Need something repaired in your premises?</h1>
                <h4>Call on our repair experts to restore it to working order!</h4>
                <a href="{{ route('posts.post')}}" class='directory'>Find a directory</a>
            </div>
            <div class="call"></div>
        </div>
    </div>
    <div class="latest">
        <div class="container">
            <div class="row">
                <div class="col-md-4 card-container">
                    <div class="card-latest">
                        <div class="card-header">Latest Announcements</div>
                        <div class="card-body">
                            <ul>
                                @foreach ($latestPosts as $post)
                                    <li class="announcement-item">
                                        <img src="{{ $post->postImage }}" alt="{{ $post->content }}"
                                            class="announcement-image">
                                        <div class="announcement-details">
                                            <strong>{{ $post->content }}</strong><br>
                                            <span class="location">{{ $post->user->location }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 card-container">
                    <div class="card-latest">
                        <div class="card-header">Top Rated</div>
                        <div class="card-body">
                            <ul>
                                @foreach ($topRatedUsers as $user)
                                    <li class="top-rated-item">
                                        <img src="{{ $user->image }}" alt="{{ $user->name }}" class="top-rated-image">
                                        <div class="top-rated-details">
                                            <strong class="name">{{ $user->name }}</strong><br>
                                            <span class='stars'>
                                                @include('star_rating', ['rating' => $user->rating])
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 card-container">
                    <div class="card-latest">
                        <div class="card-header">Most Popular Posts</div>
                        <div class="card-body">
                            <ul>
                                @foreach ($popularPosts as $post)
                                    <li class="popular-post-item">
                                        <img src="{{ $post->postImage }}" alt="{{ $post->content }}"
                                            class="popular-post-image">
                                        <div class="popular-post-details">
                                            <strong>{{ $post->content }}</strong><br>
                                            <span class="location">{{ $post->user->location }}</span><br>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('search-button').addEventListener('click', async () => {
            const query = document.getElementById('search-input').value;
            try {
                const response = await fetch(`http://localhost:8000/search?query=${query}`);
                const data = await response.json();
                console.log(data);
            } catch (error) {
                console.error('Error searching for services', error);
            }
        });
    </script>

@endsection
