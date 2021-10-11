

<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
            Hi, Randy</a
          >
          <div class="dropdown-menu">
            <a href="dashboard.html" class="dropdown-item"
              >My Product</a
            >
            <a href="dashboard-account.html" class="dropdown-item"
              >Settings</a
            >
            <div class="dropdown-divider"></div>
            <a href="/" class="dropdown-item">Logout</a>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link d-inline-block mt-2">
            <img src="/images/icon-cart-filled.svg" alt="" />
            <div class="card-badge">3</div>
          </a>
        </li>
      </ul>
      <!-- Akhir Dekstop Menu -->
      <!-- Awal Mobile Menu -->
      <ul class="navbar-nav d-block d-lg-none">
        <li class="nav-item">
          <a href="" class="nav-link">Hi, Randy</a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link d-inline-block">Cart</a>
        </li>
      </ul>
      <!-- Akhir Mobile Menu -->
    </div>
  </nav>

  <!-- Section content -->
  <div
    data-aos="fade-up"
    class="section-content section-dashboard-home"
  >
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">My Products</h2>
        <p class="dashboard-subtitle">Manage it well and get money</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            <a
              href="/dashboard-products-create.html"
              class="btn btn-success"
            >
              Add New Product
            </a>
            <div class="row mt-4">
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a
                  href="/dashboard-products-details.html"
                  class="card card-dashboard-product d-block"
                >
                  <div class="card-body">
                    <img
                      src="/images/product-card-1.png"
                      class="w-100 mb-2"
                      alt=""
                    />
                    <div class="product-title">Shirup Marjan</div>
                    <div class="product-category">Foods</div>
                  </div>
                </a>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a
                  href="/dashboard-products-details.html"
                  class="card card-dashboard-product d-block"
                >
                  <div class="card-body">
                    <img
                      src="/images/product-card-1.png"
                      class="w-100 mb-2"
                      alt=""
                    />
                    <div class="product-title">Shirup Marjan</div>
                    <div class="product-category">Foods</div>
                  </div>
                </a>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a
                  href="/dashboard-products-details.html"
                  class="card card-dashboard-product d-block"
                >
                  <div class="card-body">
                    <img
                      src="/images/product-card-1.png"
                      class="w-100 mb-2"
                      alt=""
                    />
                    <div class="product-title">Shirup Marjan</div>
                    <div class="product-category">Foods</div>
                  </div>
                </a>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a
                  href="/dashboard-products-details.html"
                  class="card card-dashboard-product d-block"
                >
                  <div class="card-body">
                    <img
                      src="/images/product-card-1.png"
                      class="w-100 mb-2"
                      alt=""
                    />
                    <div class="product-title">Shirup Marjan</div>
                    <div class="product-category">Foods</div>
                  </div>
                </a>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a
                  href="/dashboard-products-details.html"
                  class="card card-dashboard-product d-block"
                >
                  <div class="card-body">
                    <img
                      src="/images/product-card-1.png"
                      class="w-100 mb-2"
                      alt=""
                    />
                    <div class="product-title">Shirup Marjan</div>
                    <div class="product-category">Foods</div>
                  </div>
                </a>
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a
                  href="/dashboard-products-details.html"
                  class="card card-dashboard-product d-block"
                >
                  <div class="card-body">
                    <img
                      src="/images/product-card-1.png"
                      class="w-100 mb-2"
                      alt=""
                    />
                    <div class="product-title">Shirup Marjan</div>
                    <div class="product-category">Foods</div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bwastore-laravel\resources\views/pages/dashboard-product.blade.php ENDPATH**/ ?>