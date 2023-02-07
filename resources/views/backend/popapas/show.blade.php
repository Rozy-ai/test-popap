@extends('backend.admin.layouts.common')

@section('content')
<!-- NAVBAR -->
<nav>
    <i class='fa fa-menu'></i>
    <a href="#" class="nav-link">Popapa</a>
</nav>
<!-- NAVBAR -->

<!-- MAIN -->
<main>

    <div class="container">
        <div class="card_white">
            <h3 class="text-blue mb-2">Popapa:</h3>
            <div class="mb-2">id: <strong>{{ $popapa->id }}</strong></div>
            <div class="mb-2">Title: <strong>{{ $popapa->title }}</strong></div>
            <div class="mb-2">Content: <strong>{!! $popapa->content !!}</strong></div>
            <div class="mb-2">Status: <strong>{{ $popapa->status }}</strong></div>
            <div class="mb-2">View: <strong>{{ $popapa->view }}</strong></div>
            <div class="mb-2">Script: <strong>{{ $popapa->script->path_scripts ?? '' }}</strong></div>
            <a href="{{ route('popapas.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

</main>
<!-- MAIN -->
@endsection