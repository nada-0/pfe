@extends('layouts.app')

@section('title', 'Meetup Details')

@section('content')
<div class="container container-edit">
    <div class="meetup-details-container">
        <h2 class="meetup-title">{{ $meetup->name }}</h2>
        <p><strong>Date:</strong> {{ $meetup->date }}</p>
        <p><strong>End Time:</strong> {{ $meetup->end_time }}</p>
        <p><strong>Location:</strong> {{ $meetup->location }}</p>
        <p><strong>Type:</strong> {{ $meetup->type }}</p>
        <a href="{{ route('meetups.index') }}" class="back-to-meetups-btn">Back</a>
        <a href="{{ route('meetups.edit', $meetup) }}" class="back-to-meetups-btn">Edit</a>
    </div>
</div>
@endsection
