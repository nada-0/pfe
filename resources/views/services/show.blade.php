@extends('layouts.app')

@section('content')
<div class="container service-details-container">
    <h1 class="service-title">{{ $service->name }}</h1>
    <p class="service-description">{{ $service->description }}</p>
    <p><strong class="service-label">Category:</strong> {{ $service->category->name }}</p>
    <p><strong class="service-label">Provided by:</strong> {{ $service->user->name }}</p>
    <p><strong class="service-label">Contact:</strong> {{ $service->user->email }} | {{ $service->user->phone }}</p>
    <p><strong class="service-label">Price:</strong> ${{ $service->user->priceWork }}</p>
    <p><strong class="service-label">Location:</strong> {{ $service->user->location }}</p>
    <p><strong class="service-label">Rating:</strong> {{ $service->user->rating }}</p>
    <a href="{{ route('services.service') }}" class="btn btn-secondary back-to-services-btn">Back to Services</a>
</div>
@endsection
