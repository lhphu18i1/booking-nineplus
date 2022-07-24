<body>
    <div class="sidebar-container">
      <div class="sidebar-logo">
        <img class="logo" src="/home/img/logo.png" alt="">
      </div>
      <div>
        <div class="hello">
          Xin chào: <strong>{{ Auth::user()->name }}</strong>
          {{-- <a href="{{ route('logout.user') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="text-decoration: none; text-align: center; margin-left: 31%;">Logout</a>
          <form action="{{ route('logout.user') }}" method="post" class="d-none" id="logout-form">@csrf</form> --}}
          <a href="{{ route('logout.user') }}" onclick="event.preventDefault();document.getElementById('logout-admin').submit();" style="text-decoration: none; text-align: center; margin-left: 31%;">Logout</a>
        <form action="{{ route('logout.user') }}" method="post" class="d-none" id="logout-admin">@csrf</form>
        </div>
      </div>
      <ul class="sidebar-navigation">
        <li>
          <a href="{{ route('home.index') }}">
            <i class="fa fa-home" aria-hidden="true"></i>Room list
          </a>
        </li>
        <li>
          <a href="{{ route('list.booking') }}">
            <i class="fa fa-tachometer" aria-hidden="true"></i>List booking
          </a>
        </li>
      </ul>
    </div>

    <div class="content-container">

      

