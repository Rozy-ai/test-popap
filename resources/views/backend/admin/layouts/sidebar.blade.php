<!-- SIDEBAR -->
<section id="sidebar">
    <a href="/" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">Popapa</span>
    </a>
    <ul class="side-menu top">
        <li class="@if(Request::segment(2)=='popapas') active @endif">
            <a href="{{ route('popapas.index') }}">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Popaps</span>
            </a>
        </li>

    </ul>
    <ul class="side-menu">
        <li>
            <a href="{{ route('logout') }}" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->
