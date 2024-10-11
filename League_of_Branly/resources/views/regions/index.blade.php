@extends('layouts.app')

@section('content')
<div class="container">
    <x-page-header title="Regions" :create-route="route('regions.create')" />

    <x-table-grid-view
        title="regions"
        :items="$regions"
        :columns="['name' => 'Name']"
        route-prefix="regions" />
</div>
@endsection