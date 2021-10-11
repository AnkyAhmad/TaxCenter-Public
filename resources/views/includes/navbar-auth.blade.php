<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      id="zoom-default"
      data-aos="fade-down"
    >
      <div class="container-fluid">
        <a href="{{ route('home') }}" class="navbar-brand">
          <img src="/images/logotaxcenter.png" alt="Logo" />
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

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
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
            
          </ul>
        </div>
      </div>
    </nav>