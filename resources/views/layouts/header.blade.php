<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @yield('navbar_menu')
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        @if(Auth::guest())
        <div class="row">
        <a class="nav-link font-weight-bold" href="/" role="button">
            Home
        </a>
        <a class="nav-link font-weight-bold" href="/login" role="button">
            Login
        </a>
        </div>
        @else
        <div class="row">
        <a class="nav-link font-weight-bold" href="/dashboard" role="button">
            Dashboard
        </a>
        <a class="nav-link font-weight-bold" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </div>
        @endif
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->