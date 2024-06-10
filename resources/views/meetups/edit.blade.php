@extends('layouts.app')

@section('title', 'Edit Meetup')

@section('content')
<div class="container container-edit">
    <h2>Edit Meetup</h2>
    <form action="{{ route('meetups.update', $meetup) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="input-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control input-field" value="{{ $meetup->name }}">
        </div>
        <div class="form-group">
            <label for="date" class="input-label">Date:</label>
            <input type="date" name="date" id="date" class="form-control input-field" value="{{ $meetup->date }}">
        </div>
        <div class="form-group">
            <label for="end_time" class="input-label">End Time:</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control input-field" value="{{ \Carbon\Carbon::parse($meetup->end_time)->format('Y-m-d\TH:i') }}">
        </div>
        <div class="form-group">
            <label for="location" class="input-label">Location:</label>
            <input type="text" name="location" id="location" class="form-control input-field" value="{{ $meetup->location }}">
        </div>
        <div class="form-group">
            <label for="type" class="input-label">Type:</label>
            <input type="text" name="type" id="type" class="form-control input-field" value="{{ $meetup->type }}">
        </div>
        <button type="submit" class="btn btn-meet-update">Update</button>
        <a href="{{ route('meetups.index') }}" class="btn btn-meet-cancel">Cancel</a>
    </form>
</div>
@endsection
