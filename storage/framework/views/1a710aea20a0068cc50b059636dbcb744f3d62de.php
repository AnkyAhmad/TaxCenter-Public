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

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <?php echo $__env->yieldPushContent('prepend-style'); ?>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="shortcut icon" href="/images/favicon.png">
    <link href="/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.css"/>
    <?php echo $__env->yieldPushContent('addon-style'); ?>
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Side bar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/icon_admin.png" style="width: 100px" class="my-4" alt="" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="<?php echo e(route('admin-dashboard')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('admin')) ? 'active' : ''); ?>"
              >Dashboard
            </a>
            <a
              href="<?php echo e(route('product.index')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('admin/product')) ? 'active' : ''); ?>"
            >Semua Produk
            </a>
            <a
              href="<?php echo e(route('product-gallery.index')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('admin/product-gallery*')) ? 'active' : ''); ?>"
            >Foto Produk
            </a>
            <a
              href="<?php echo e(route('category.index')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('admin/category*')) ? 'active' : ''); ?>"
            >Kategori
            </a>
            <a
              href="<?php echo e(route('transaction.index')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('admin/transaction*')) ? 'active' : ''); ?>"
              >Transaksi
            </a>
            <a
              href="<?php echo e(route('user.index')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('admin/user*')) ? 'active' : ''); ?>"
              >User
            </a>
          </div>
        </div>

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
                    
                    <a href="<?php echo e(route('home')); ?>" class="dropdown-item">Home</a>
                      <div class="dropdown-divider"></div>
                      <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Keluar</a>
                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                        <?php echo csrf_field(); ?>
                    </form>
                  </div>
                </li>
              </ul>
              <!-- Akhir Dekstop Menu -->
              <!-- Awal Mobile Menu -->
              <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                  <a href="" class="nav-link">Hi, <?php echo e(Auth::user()->name); ?></a>
                </li>
                <?php if(Auth::user() && Auth::user()->roles == 'ADMIN'): ?>
                <li class="nav-item">
                  <a href="<?php echo e(route('admin-dashboard')); ?>" class="nav-link d-inline-block">Admin Dashboard</a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                  <a href="<?php echo e(route('home')); ?>" class="nav-link d-inline-block">Beranda</a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(route('logout')); ?>" class="nav-link d-inline-block">Keluar</a>
                </li>
              </ul>
              <!-- Akhir Mobile Menu -->
            </div>
        </nav>

          <!-- Section content -->
          <?php echo $__env->yieldContent('content'); ?>
        </div>
      </div>
    </div>

    <!-- Akhir Page content -->

    <!-- Bootstrap core JavaScript -->
    <?php echo $__env->yieldPushContent('prepend-script'); ?>
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
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
    <?php echo $__env->yieldPushContent('addon-script'); ?>
  </body>
</html>
<?php /**PATH /home/u1358072/laravel/resources/views/layouts/admin.blade.php ENDPATH**/ ?>