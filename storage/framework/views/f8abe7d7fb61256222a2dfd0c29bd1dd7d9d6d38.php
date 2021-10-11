<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      id="zoom-default"
      data-aos="fade-down"
    >
      <div class="container-fluid">
        <a href="<?php echo e(route('home')); ?>" class="navbar-brand">
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
        <form form action="<?php echo e(route('home-search')); ?>"  class="d-flex">
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
              <?php if(auth()->guard()->check()): ?>
              <li class="nav-item">
                <a href="" class="nav-link">Hi, <?php echo e(Auth::user()->name); ?></a>
              </li>
              <?php endif; ?>
              <?php if(Auth::user() && Auth::user()->roles == 'ADMIN'): ?>
              <li class="nav-item">
                <a href="<?php echo e(route('admin-dashboard')); ?>" class="nav-link d-inline-block">Admin Dashboard</a>
              </li>
              <?php endif; ?>
              <li class="nav-item">
                <a href="<?php echo e(route('dashboard')); ?>" class="nav-link">Dashboard</a>
              </li>
            </ul>
            <!-- Akhir Mobile Menu -->
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('home')); ?>"
                >Beranda<span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('categories')); ?>">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('about')); ?>">Tentang</a>
            </li>
            <li class="home-divider"></li>
            <?php if(auth()->guard()->guest()): ?>  
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('register')); ?>">Daftar</a>
            </li>
            <li class="nav-item">
              <a
                class="btn btn-success nav-link px-4 text-white"
                href="<?php echo e(route('login')); ?>"
                >Masuk</a 
              >
            </li>
            <?php endif; ?>
          </ul>
          <?php if(auth()->guard()->check()): ?>
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
                Hi, <?php echo e(Auth::user()->name); ?></a
              >
              <div class="dropdown-menu">
                <?php if(Auth::user() && Auth::user()->roles == 'ADMIN'): ?>  
                  <a href="<?php echo e(route('admin-dashboard')); ?>" class="dropdown-item">Admin Dashboard</a>
                <?php endif; ?>
                <a href="<?php echo e(route('dashboard')); ?>" class="dropdown-item">Dashboard</a>
                <a href="<?php echo e(route('dashboard-settings-account')); ?>" class="dropdown-item"
                  >Pengaturan</a
                >
                <div class="dropdown-divider"></div>
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Keluar</a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                  <?php echo csrf_field(); ?>
              </form>
              </div>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('cart')); ?>" class="nav-link d-inline-block mt-2">
                <?php
                  $carts = App\Models\Cart::where('users_id', Auth::user()->id)->count();
                ?>
                <?php if($carts > 0): ?>
                  <img src="/images/icon-cart-filled.svg" alt="" />
                  <div class="card-badge"><?php echo e($carts); ?></div>
                <?php else: ?>
                <img src="/images/icon-cart-empty.svg" alt="" />
                <?php endif; ?>
              </a>
            </li>
          </ul>
          <!-- Akhir Dekstop Menu -->
          <?php endif; ?>
        </div>
      </div>
    </nav><?php /**PATH C:\xampp\htdocs\belilo\resources\views/includes/navbar.blade.php ENDPATH**/ ?>