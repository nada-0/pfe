@extends('layouts.app')
@section('title', 'Services')
@section('content')
    <div class="service">
        <div class="container">
            <h1>Services</h1>
            <div class="services-container">
                @foreach ($services as $service)
                    <div class="service-card">
                        <div class="service-content">
                            <h5 class="service-title">{{ $service->name }}</h5>
                            <p class="service-description">{{ \Illuminate\Support\Str::limit($service->description, 100) }}
                            </p>
                            <p class="service-category"><small class="text-muted">Category:
                                    {{ $service->category->name }}</small></p>
                            <p class="service-author"><small class="text-muted">By: {{ $service->user->name }}</small></p>
                            <a href="{{ route('services.show', $service->id) }}" class="view-details-btn">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-links">
                {{ $services->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
@endsection
