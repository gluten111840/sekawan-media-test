<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset("assets/mining.png") }}" alt="Nickelity" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Nickelity</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset("bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @if(Auth::guest())
          <a href="#" class="d-block">{{ 'Pengguna' }}</a>
          @else
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/vehicles" class="nav-link @yield('active_vehicle')">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Kendaraan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/order" class="nav-link @yield('active_order')">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Pesanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/driver" class="nav-link @yield('active_driver')">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pengemudi
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>