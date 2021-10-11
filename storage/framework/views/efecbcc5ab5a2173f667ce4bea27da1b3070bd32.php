

<?php $__env->startSection('title'); ?>
    Dashboard Transaction Details
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
          <a href="cart.html" class="nav-link d-inline-block mt-2">
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
        <h2 class="dashboard-title">#STORE9087</h2>
        <p class="dashboard-subtitle">Detail Transaction</p>
      </div>
      <div class="dashboard-content" id="transactionDetails">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-4">
                    <img
                      src="/images/product-details-dashboard.png"
                      alt=""
                      class="w-100 mb-3"
                    />
                  </div>
                  <div class="col-12 col-md-8">
                    <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="product-title">Customer Name</div>
                        <div class="product-subtitle">
                          Randy Nugraha
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Product Name</div>
                        <div class="product-subtitle">
                          Shirup Marzzan
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">
                          Tanggal Transaksi
                        </div>
                        <div class="product-subtitle">3 Maret 2021</div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Status</div>
                        <div class="product-subtitle">Pending</div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Total</div>
                        <div class="product-subtitle">
                          Rp. 2.000.000
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">No Handphone</div>
                        <div class="product-subtitle">0878756746</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-12">
                <h5>Shipping Information</h5>
              </div>
              <div class="col-12">
                <div class="row">
                  <div class="col-12 col-md-6">
                    <div class="product-title">Address 1</div>
                    <div class="product-subtitle">
                      Setra Duta Cemara
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="product-title">Address 2</div>
                    <div class="product-subtitle">Blok M2 No 13</div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="product-title">Province</div>
                    <div class="product-subtitle">Jawa Barat</div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="product-title">City</div>
                    <div class="product-subtitle">Bandung</div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="product-title">Postal Code</div>
                    <div class="product-subtitle">10298</div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="product-title">Country</div>
                    <div class="product-subtitle">Indonesia</div>
                  </div>
                  <div class="col-12 col-md-3">
                    <div class="product-title">Status</div>
                    <select name="status" id="status" class="form-control" v-model="status">
                      <option value="UNPAID">Unpaid</option>
                      <option value="PENDING">Pending</option>
                      <option value="SHIPPING">Shipping</option>
                      <option value="SUCCESS">Success</option>
                    </select>
                  </div>
                  <template v-if="status == 'SHIPPING'">
                    <div class="col-md-3">
                      <div class="product-title">Input Resi</div>
                      <input
                      type="text"
                      class="form-control"
                      name="resi"
                      v-model="resi"
                      />
                    </div>
                      <div class="col-md-2">
                      <button
                      type="submit"
                      class="btn btn-success btn-block mt-4"
                      >
                      Update Resi
                      </button>
                    </div>
                  </template>
                  </div>
                  <div class="row mt-3">
                    <div class="col-12 text-right">
                      <button class="btn btn-success btn-lg mt-4">Save Now</button>
                    </div>
                </div>
                <div class="row">
                     <p>    </p>
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
<script src="/vendor/vue/vue.js"></script>
<script>
  var transactionDetails = new Vue({
    el: "#transactionDetails",
    data: {
      status: "SHIPPING",
      resi: "23423432432423",
    },
  });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bwastore-laravel\resources\views/pages/dashboard-transaction-details.blade.php ENDPATH**/ ?>