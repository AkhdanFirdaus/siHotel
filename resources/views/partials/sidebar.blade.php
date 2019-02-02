<ul class="nav flex-column shadow">
    <li class="nav-item bg-success p-2">
        <a href="{{ route('home') }}" class="nav-link text-light"><h3>siHotel</h3></a>
    </li>
    <li class="nav-item jumbotron round-0">
        <h3>{{ Auth::user()->name }}</h3>
        <hr class="border">
        @foreach(Auth::user()->roles as $role)
        <p>{{ $role->nama }}</p>
        @endforeach
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
    </li>
    @if(Auth::user()->hotel_id != null)
    <li class="nav-item">        
        <a href="{{ route('hotel.show', Auth::user()->hotel_id) }}" class="nav-link">Hotel</a>        
    </li>
    @endif
    <li class="nav-item">
        <a href="" class="nav-link">Room</a>
    </li>
    <li class="nav-item">
        <a href="" class="nav-link">Guest</a>
    </li>
    <li class="nav-item mb-4">
        <a href="" class="nav-link">Feedback</a>
    </li>
    @if(!Request::is('dashboard'))
    <li class="nav-item bg-success p-3 text-light">
        <h3>{{ \Carbon\Carbon::now()->toFormattedDateString() }}</h3>
    </li>
    @endif
</ul>