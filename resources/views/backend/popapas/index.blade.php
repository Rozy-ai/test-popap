@extends('backend.admin.layouts.common')

@section('content')


<nav>
    <i class='bx bx-menu'></i>
    <a href="#" class="nav-link">Popaps</a>
    <form method="GET" action="{{ route('popapas.index') }}" >
        <div class="form-input">
            <input type="search" name="search" placeholder="Search...">
            <button type="submit" class="search-btn"><i class='fa fa-search poisk'></i></button>
        </div>
    </form>
    </a>
</nav>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
        </div>
        <a href="{{ route('popapas.create') }}" class="btn-download">
            <span class="text">+ Create Popapa</span>
        </a>
    </div>

    <ul class="box-info" style="padding-left: 0;">
        <li>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3>{{ $popaps_1 }}</h3>
                <p>Active Popaps</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-group' ></i>
            <span class="text">
                <h3>{{ $popaps_0 }}</h3>
                <p>Passive Popaps</p>
            </span>
        </li>
    </ul>


    @if (Session::has('message'))
        <div class="bg-info text-white p-2 w-75">
            <span>{{ Session::get('message') }}</span>
        </div>
    @endif

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Popapa Orders</h3>
                {{-- <i class='fa fa-search'></i> --}}
                {{-- <i class='fa fa-filter'></i> --}}
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($popaps as $popapa)
                    <tr>
                        <td>
                            {{ $popapa->title}}
                        </td>
                        <td><span class="status @if ($popapa->status == 1)
                            green
                        @else
                            red
                        @endif">{{ $popapa->status }}</span></td>
                        <td><span class="status yellowgreen">{{ $popapa->view }}</span></td>
                        <td class="th_td">
                            <a href="{{ route('popapas.show', $popapa->id) }}">
                                <span class="status completed"><i class="fa fa-eye"></i></span>
                            </a>
                            <a href="{{ route('popapas.edit', $popapa) }}">
                                <span class="status process" style="margin-top: 3px"><i class="fa fa-pen-alt"></i></span>
                            </a>
                            <form method="POST" action="{{ route('popapas.destroy', $popapa->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="status pending no-focus" style="border:none"><i class="fa fa-trash-alt"></i></button>
                            </form>
                            @if ($popapa->status === 1)
                                <a href="{{ route('path_script', $popapa) }}" 
                                class="btn btn-outline-primary status text-black-50" style="margin-left: 5px;">Copy</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mx-auto d-f justify-content-center mt-3">{{$popaps->onEachSide(5)->links()}}</div>
        </div>
    </div>
</main>
<!-- MAIN -->
</section>

@endsection