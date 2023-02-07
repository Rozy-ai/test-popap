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
            <h3 class="text-blue mb-2">Popapa Script Path:</h3>
            <div class="m-2"><strong>{{ $popapa->script->path_scripts ?? '' }}</strong></div>
            <a href="{{ route('popapas.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

</main>
<!-- MAIN -->
@endsection