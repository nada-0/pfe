<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2/css/all.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    <title>Bricolage: Profile</title>
    <style>
        .check {
            display: flex;
        }
    </style>
</head>

<body>
    <nav>
        <a href="{{ url('/') }}" class="profile"><i class="fa-solid fa-angle-left"></i> Profile</a>
        <div class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img src="{{ $user->image }}" alt="{{ $user->name }}">
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="profile-header">
            <img src="{{ $user->image }}" alt="{{ $user->name }}" />
            <div class="info">
                <h4>{{ $user->name }}</h4>
                <p>{{ $user->email }} | {{ $user->phone }}</p>
            </div>
        </div>
        <div class="section">
            <a href="{{ route('profiles.editProfile')}}"><i class="fa-regular fa-address-card"></i> Edit profile information</a>
            <form id="notifications-form" action="{{ route('toggle.notifications') }}" method="POST">
                @csrf
                <div class="check">
                    <p for="notifications_on">
                        <i class="fa-regular fa-bell"></i> Notifications
                    </p>
                    <input class="form-check-input right cb" type="checkbox" id="notifications_on" name="notifications_on" {{ $user->notifications_on ? 'checked' : '' }}>
                </div>
            </form>
            <div>
                <p><i class="fa-solid fa-globe"></i> Language <span class="right">English</span></p>
            </div>
        </div>
        <div class="section">
            <p><i class="fa-solid fa-shield-halved"></i> Security</p>
            <div>
                <p><i class="fa-solid fa-sliders"></i> Theme <span class="right">Light mode</span></p>
            </div>
        </div>
        <div class="section">
            <a href="{{ route('meetups.index') }}"><i class="fa-solid fa-calendar-days"></i> Calender</a>
            <a href="{{route('profiles.destroy')}}" style="color: red"><i class="fa-solid fa-trash"></i> Delete my account</a>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name="notifications_on"]').change(function() {
                $('#notifications-form').submit();
            });

            $('#notifications-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log('Notification preference updated successfully.');
                    },
                    error: function(error) {
                        console.log('Error updating notification preference.');
                    }
                });
            });
        });
    </script>
</body>

</html>
