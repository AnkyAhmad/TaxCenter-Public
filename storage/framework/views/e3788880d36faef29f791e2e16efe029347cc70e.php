

<?php $__env->startSection('title'); ?>
    Dashboard Product Details
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
            <a href="dashboard.html" class="dropdown-item">Dashboard</a>
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
        <h2 class="dashboard-title">Sirup Marzzan</h2>
        <p class="dashboard-subtitle">Ubah Produk Kamu</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            <form action="">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Harga</label>
                        <input type="number" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Deskripsi Produk</label>
                        <textarea name="editor"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Kategori</label>
                        <select
                          name="category"
                          class="form-control"
                          id=""
                        >
                          <option value="" disabled>
                            Select category
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 mt-4">
                      <button
                        class="btn btn-success btn-block"
                        type="submit"
                      >
                        Save
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="gallery-container">
                      <img
                        src="/images/product-card-1.png"
                        class="w-100"
                        alt=""
                      />
                      <a href="#" class="delete-gallery">
                        <img src="/images/icon-delete.svg" alt="" />
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="gallery-container">
                      <img
                        src="/images/product-card-2.png"
                        class="w-100"
                        alt=""
                      />
                      <a href="#" class="delete-gallery">
                        <img src="/images/icon-delete.svg" alt="" />
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="gallery-container">
                      <img
                        src="/images/product-card-3.png"
                        class="w-100"
                        alt=""
                      />
                      <a href="#" class="delete-gallery">
                        <img src="/images/icon-delete.svg" alt="" />
                      </a>
                    </div>
                  </div>

                  <div class="col-12 mt-4">
                    <input
                      type="file"
                      name=""
                      id="file"
                      style="display: none"
                      multiple
                    />
                    <button
                      class="btn btn-secondary btn-block"
                      type="submit"
                      onclick="thisFileUpload()"
                    >
                      update foto
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace("editor");
</script>
<script>
  function thisFileUpload() {
    document.getElementById("file").click();
  }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bwastore-laravel\resources\views/pages/dashboard-product-details.blade.php ENDPATH**/ ?>