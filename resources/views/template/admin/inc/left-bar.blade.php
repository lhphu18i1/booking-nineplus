<div class="sidebar-container">
    <div class="sidebar-logo">
        <img class="logo" src="{{ asset('admin/img/logo.png') }}" alt="">
    </div>
    <div>
        <div class="hello">
        Xin chào: <strong>{{ Auth::user()->name }}</strong>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-admin').submit();" style="text-decoration: none; text-align: center; margin-left: 31%;">Logout</a>
        <form action="{{ route('logout') }}" method="post" class="d-none" id="logout-admin">@csrf</form>
        </div>
    </div>
    <ul class="sidebar-navigation">
        <li class="header"></i>COMMUNITY</li>
        <li>
            <a href="{{ route('admin.index') }}">
                <i class="fa fa-tachometer" aria-hidden="true"></i> Admin
            </a>
        </li>
        <li>
            <a href="{{ route('user.index') }}">
                <i class="fa fa-tachometer" aria-hidden="true"></i> User List
            </a>
        </li>
        <li class="header">Booking</li>
        <li>
            <a href="{{ route('room.index') }}">
                <i class="fa fa-info-circle" aria-hidden="true"></i> Room List
            </a>
        </li>
        <li>
            <a href="{{ route('booking.index') }}">
                <i class="fa fa-info-circle" aria-hidden="true"></i> Booking List
            </a>
        </li>
        <li>
            <a href="{{ route('time.index') }}">
                <i class="fa fa-cog" aria-hidden="true"></i> Time List
            </a>
        </li>
        <li>
            <a href="{{ route('department.index') }}">
                <i class="fa fa-users" aria-hidden="true"></i> Department List
            </a>
        </li>
        <li>
            <a href="{{ route('position.index') }}">
                <i class="fa fa-cog" aria-hidden="true"></i> Position List
            </a>
        </li>
    </ul>
</div>
