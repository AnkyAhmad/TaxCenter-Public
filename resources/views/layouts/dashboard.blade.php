<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="shortcut icon" href="/images/favicon.png">
    <link href="/style/main.css" rel="stylesheet" />
    @stack('addon-style')
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Side bar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/logotaxcenter.png" alt="Logo" width="165" height="35"  class="my-4 " alt="" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="{{ route('dashboard') }}"
              class="list-group-item list-group-item-action {{ (request()->is('dashboard')) ? 'active' : '' }}"
              >Dashboard
            </a>
            <a
              href="{{ route('dashboard-product') }}"
              class="list-group-item list-group-item-action {{ (request()->is('dashboard/products*')) ? 'active' : '' }}"
              >Produk
            </a>
            <a
              href="{{ route('dashboard-transactions') }}"
              class="list-group-item list-group-item-action {{ (request()->is('dashboard/transactions*')) ? 'active' : '' }}"
              >Transaksi
            </a>
            <a
              href="{{ route('dashboard-omzet') }}"
              class="list-group-item list-group-item-action {{ (request()->is('dashboard/omzet*')) ? 'active' : '' }}"
              >Omzet
            </a>
            <a
              href="{{ route('dashboard-settings-store') }}"
              class="list-group-item list-group-item-action {{ (request()->is('dashboard/settings*')) ? 'active' : '' }}"
              >Pengaturan Toko
            </a>
            <a
              href="{{ route('dashboard-settings-account') }}"
              class="list-group-item list-group-item-action {{ (request()->is('dashboard/account*')) ? 'active' : '' }}"
              >Akun Saya
            </a>
          </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
       

        <!-- Page content -->
        <div id="page-content-wrapper">
        <nav
            class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
            data-aos="fade-down"
          >
            <button
              class="btn btn-secondary d-md-none mr-auto mr-2"
              id="menu-toggle"
            >
              &laquo; Menu
            </button>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarNavAltMarkup"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Awal Dekstop Menu -->
              <ul class="navbar-nav d-none d-lg-flex ml-auto">
                <li class="nav-item dropdown">
                  <a
                    href=""
                    class="nav-link"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                  >
                    <img
                      src="/images/icon-user.png"
                      alt=""
                      class="rounded-circle mr-2 profile-picture"
                    />
                    Hi, {{ Auth::user()->name }}</a
                  >
                  <div class="dropdown-menu">
                    @if (Auth::user() && Auth::user()->roles == 'ADMIN')  
                    <a href="{{ route('admin-dashboard') }}" class="dropdown-item">Admin Dashboard</a>
                    @endif
                    
                    <a href="{{ route('home') }}" class="dropdown-item">Beranda</a>
                    <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item"
                      >Pengaturan</a
                    >

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" 
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Keluar</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                    @php
                      $carts = App\Models\Cart::where('users_id', Auth::user()->id)->count();
                    @endphp
                    @if ($carts > 0)
                      <img src="/images/icon-cart-filled.svg" alt="" />
                      <div class="card-badge">{{ $carts }}</div>
                    @else
                    <img src="/images/icon-cart-empty.svg" alt="" />
                    @endif
                  </a>
                </li>
              </ul>
              <!-- Akhir Dekstop Menu -->
              <!-- Awal Mobile Menu -->
              <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                  <a href="" class="nav-link">Hi, {{ Auth::user()->name }}</a>
                </li>
                @if (Auth::user() && Auth::user()->roles == 'ADMIN')
                <li class="nav-item">
                  <a href="{{ route('admin-dashboard') }}" class="nav-link d-inline-block">Admin Dashboard</a>
                </li>
                @endif
                <li class="nav-item">
                  <a href="{{ route('home') }}" class="nav-link d-inline-block">Beranda</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('cart') }}" class="nav-link d-inline-block">Keranjang</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  
                    class="nav-link d-inline-block">Keluar</a>
                </li>
              </ul>
              <!-- Akhir Mobile Menu -->
            </div>
        </nav>

          <!-- Section content -->
          @yield('content')
        </div>
      </div>
    </div>

    <!-- Akhir Page content -->

    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/script/navbar-scroll.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    @stack('addon-script')
  </body>
</html>
