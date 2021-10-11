<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      id="zoom-default"
      data-aos="fade-down"
    >
      <div class="container-fluid">
        <a href="{{ route('home') }}" class="navbar-brand">
          <img src="/images/logotaxcenter.png" alt="Logo" width="165" height="35" class="d-inline-block align-text-top" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <form form action="{{ route('home-search') }}"  class="d-flex">
          <input class="form-control mr-2" type="text" name="query" placeholder="Cari Produk" aria-label="Search">
          <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
        </form>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item text-center">
              
            </li>
            <hr class="navbar-divider">
            <!-- Awal Mobile Menu -->
            <ul class="navbar-nav d-block d-lg-none">
              @auth
              <li class="nav-item">
                <a href="" class="nav-link">Hi, {{ Auth::user()->name }}</a>
              </li>
              @endauth
              @if (Auth::user() && Auth::user()->roles == 'ADMIN')
              <li class="nav-item">
                <a href="{{ route('admin-dashboard') }}" class="nav-link d-inline-block">Admin Dashboard</a>
              </li>
              @endif
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
              </li>
            </ul>
            <!-- Akhir Mobile Menu -->
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}"
                >Beranda<span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('categories') }}">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about') }}">Tentang</a>
            </li>
            <li class="home-divider"></li>
            @guest  
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Daftar</a>
            </li>
            <li class="nav-item">
              <a
                class="btn btn-success nav-link px-4 text-white"
                href="{{ route('login') }}"
                >Masuk</a 
              >
            </li>
            @endguest
          </ul>
          @auth
           <!-- Awal Dekstop Menu -->
          <ul class="navbar-nav d-none d-lg-flex">
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
                <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item"
                  >Pengaturan</a
                >
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Keluar</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
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
          @endauth
        </div>
      </div>
    </nav>