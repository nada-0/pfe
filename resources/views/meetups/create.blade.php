@extends('layouts.app')

@section('title', 'Add Meetup')

@section('content')
<div class="container container-edit">
    <h2>Add Meetup</h2>
    <form action="{{ route('meetups.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name" class="input-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control input-field" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="date" class="input-label">Date:</label>
            <input type="date" name="date" id="date" class="form-control input-field" value="{{ old('date') }}">
        </div>
        <div class="form-group">
            <label for="end_time" class="input-label">End Time:</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control input-field" value="{{ old('end_time') }}">
        </div>
        <div class="form-group">
            <label for="location" class="input-label">Location:</label>
            <input type="text" name="location" id="location" class="form-control input-field" value="{{ old('location') }}">
        </div>
        <div class="form-group">
            <label for="type" class="input-label">Type:</label>
            <input type="text" name="type" id="type" class="form-control input-field" value="{{ old('type') }}">
        </div>
        <button type="submit" class="btn btn-meet-update">Add</button>
        <a href="{{ route('meetups.index') }}" class="btn btn-meet-cancel">Cancel</a>
    </form>
</div>
@endsection
