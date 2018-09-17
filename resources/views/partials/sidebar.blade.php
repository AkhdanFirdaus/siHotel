<ul class="nav flex-column shadow">
    <li class="nav-item bg-success p-3">
        <a href="{{ route('home') }}" class="nav-link text-light"><h3>siHotel</h3></a>
    </li>
    <li class="nav-item jumbotron">
        <h3>{{ Auth::user()->name }}</h3>
    </li>
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="" class="nav-link">Hotel</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('look.index') }}" class="nav-link">Room</a>
    </li>
    <li class="nav-item">
        <a href="" class="nav-link">Guest</a>
    </li>
    <li class="nav-item">
        <a href="" class="nav-link">Feedback</a>
    </li>
    @if(!Request::is('dashboard'))
    <li class="nav-item bg-success p-3 mt-4 text-light">
        <h3>{{ \Carbon\Carbon::now()->toFormattedDateString() }}</h3>
    </li>
    @endif
</ul>               