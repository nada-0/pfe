@extends('layouts.app')

@section('title', $meetup ? 'Edit Meetup' : 'Create Meetup')

@section('content')
<div class="container">
    <h2>{{ $meetup ? 'Edit Meetup' : 'Create Meetup' }}</h2>

    <form action="{{ $meetup ? route('meetups.update', $meetup) : route('meetups.store') }}" method="POST">
        @csrf
        @if ($meetup)
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $meetup->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $meetup->location ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="datetime-local" name="date" id="date" class="form-control" value="{{ old('date', $meetup && $meetup->date ? $meetup->date->format('Y-m-d\TH:i') : '') }}" required>
        </div>

        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ old('end_time', $meetup && $meetup->end_time ? $meetup->end_time->format('Y-m-d\TH:i') : '') }}" required>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" id="type" class="form-control" value="{{ old('type', $meetup->type ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ $meetup ? 'Update Meetup' : 'Create Meetup' }}</button>
    </form>
</div>
@endsection
