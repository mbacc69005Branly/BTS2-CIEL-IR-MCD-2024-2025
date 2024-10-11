@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">LoLdle - Classic</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($champions as $champion)
        <div class="col">
            <div class="card h-100 champion-card">
                <img src="{{ asset('images/champions/' . $champion->name . '.jpg') }}" class="card-img-top champion-avatar" alt="{{ $champion->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $champion->name }}</h5>
                    <p class="card-text"><strong>Gender:</strong> {{ $champion->gender->name ?? 'Unknown' }}</p>
                    <p class="card-text"><strong>Position(s):</strong> {{ $champion->positions->pluck('name')->implode(', ') }}</p>
                    <p class="card-text"><strong>Species:</strong> {{ $champion->species->name ?? 'Unknown' }}</p>
                    <p class="card-text"><strong>Resource:</strong> {{ $champion->resource->name ?? 'Unknown' }}</p>
                    <p class="card-text"><strong>Range Type:</strong> {{ $champion->rangeType->name ?? 'Unknown' }}</p>
                    <p class="card-text"><strong>Region(s):</strong> {{ $champion->regions->pluck('name')->implode(', ') }}</p>
                    <p class="card-text"><strong>Release Year:</strong> {{ $champion->release_date->format('Y') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('styles')
<style>
    .champion-card {
        background-color: var(--blue-6);
        color: var(--gold-1);
        transition: transform 0.3s ease-in-out;
    }

    .champion-card:hover {
        transform: scale(1.05);
    }

    .champion-avatar {
        height: 200px;
        object-fit: cover;
    }

    .card-title {
        color: var(--gold-4);
    }

    strong {
        color: var(--gold-2);
    }

    .btn-primary {
        background-color: var(--blue-4);
        color: var(--gold-1);
        border: none;
    }

    .btn-secondary {
        background-color: var(--gold-5);
        color: var(--blue-7);
        border: none;
    }

    .btn-primary:hover,
    .btn-secondary:hover {
        filter: brightness(1.2);
    }
</style>
@endsection