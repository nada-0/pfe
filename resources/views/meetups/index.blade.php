@extends('layouts.app')

@section('title', 'My Meetups')

@section('content')
<div class="container container-calender">
    <h2>My Meetups</h2>
    <a href="{{ route('meetups.create') }}" class="btn mb-4 btn-meet">Add Meetup</a>
    <div class="calendar">
        <div class="calendar-header">
            <a href="{{ route('meetups.index', ['year' => $prevYear, 'month' => $prevMonth]) }}" class="prev-month"><i class="fas fa-chevron-left"></i></a>
            <span class="month">{{ $currentDate->format('F Y') }}</span>
            <a href="{{ route('meetups.index', ['year' => $nextYear, 'month' => $nextMonth]) }}" class="next-month"><i class="fas fa-chevron-right"></i></a>
        </div>
        <div class="calendar-body">
            <div class="days">
                @foreach($days as $day)
                    <div class="day">{{ $day }}</div>
                @endforeach
            </div>
            @foreach($weeks as $week)
                <div class="week">
                    @foreach($week as $date)
                        <div class="day">
                            <div class="{{ $date->month != $currentDate->month ? 'text-muted' : '' }}">
                                {{ $date->day }}
                                @foreach ($meetups as $meetup)
                                    @if ($date->isSameDay(Carbon\Carbon::parse($meetup->date)))
                                        <div>
                                            <a href="{{ route('meetups.show', $meetup) }}">{{ $meetup->name }}</a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
