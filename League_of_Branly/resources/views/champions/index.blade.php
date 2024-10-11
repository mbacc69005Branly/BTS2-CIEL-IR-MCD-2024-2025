{{-- resources/views/champions/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <x-page-header title="Champions" :create-route="route('champions.create')" />


    <div id="tableView">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Resource Type</th>
                    <th>Release Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($champions as $champion)
                <tr>
                    <td>{{ $champion->name }}</td>
                    <td>{{ $champion->title }}</td>
                    <td>{{ $champion->resource_type }}</td>
                    <td>{{ $champion->release_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="gridView" class="row row-cols-1 row-cols-md-3 g-4" style="display: none;">
        @foreach($champions as $champion)
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $champion->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $champion->title }}</h6>
                    <p class="card-text">Resource: {{ $champion->resource_type }}</p>
                    <p class="card-text">Released: {{ $champion->release_date }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tableViewBtn = document.getElementById('tableViewBtn');
        const gridViewBtn = document.getElementById('gridViewBtn');
        const tableView = document.getElementById('tableView');
        const gridView = document.getElementById('gridView');

        tableViewBtn.addEventListener('click', function() {
            tableView.style.display = 'block';
            gridView.style.display = 'none';
            tableViewBtn.classList.replace('btn-secondary', 'btn-primary');
            gridViewBtn.classList.replace('btn-primary', 'btn-secondary');
        });

        gridViewBtn.addEventListener('click', function() {
            tableView.style.display = 'none';
            gridView.style.display = 'block';
            gridViewBtn.classList.replace('btn-secondary', 'btn-primary');
            tableViewBtn.classList.replace('btn-primary', 'btn-secondary');
        });
    });
</script>
@endsection