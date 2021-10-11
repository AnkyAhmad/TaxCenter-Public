

<?php $__env->startSection('title'); ?>
    Cart
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content page-cart">
  <!-- Awal Header -->
  <section
    class="store-breadcrumbs"
    data-aos="fade-down"
    data-aos-delay="100"
  >
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/">Home</a>
              </li>
              <li class="breadcrumb-item active">Cart</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir Header -->

  <!-- Awal cart -->
  <section class="store-cart">
    <div class="container">
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-12 table-responsive">
          <table class="table table-borderless table-cart">
            <thead>
              <tr>
                <td>Image</td>
                <td>Name &amp; Seller</td>
                <td>Price</td>
                <td>Total</td>
                <td>Menu</td>
              </tr>
            </thead>
            <tbody>
              <?php
                $totalPrice = 0
              ?>
              <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td style="width: 15%">
                  <?php if($cart->product->galleries->count()): ?>
                    <img
                      src="<?php echo e(Storage::url($cart->product->galleries->first()->photos)); ?>"
                      class="cart-image"
                      alt=""
                    />
                  <?php else: ?>
                      <img
                      src="/images/default_product_image.jpg"
                      class="cart-image"
                      alt=""
                    />
                  <?php endif; ?>
                  
                </td>
                <td style="width: 20%">
                  <div class="product-title"><?php echo e($cart->product->name); ?></div>
                  <div class="product-subtitle">Toko <?php echo e($cart->product->user->store_name); ?></div>
                </td>
                <td style="width: 25%">
                  <div class="product-title">Rp. <?= number_format($cart->product->price, '0', ',', '.') ?></div>
                </td>
                <td style="width: 35%">
                  <div class="product-title" aria-placeholder="1"></div>
                </td>
                <td style="width: 10%">
                  <form action="<?php echo e(route('cart-delete', $cart->id)); ?>" method="POST">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-warning btn-remove-cart"
                    >Remove
                    </button>
                  </form>
                </td>
              </tr>
              <?php
                $totalPrice += $cart->product->price 
              ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="150">
        <div class="col-12">
          <hr />
        </div>
        <div class="col-12">
          <h2 class="mb-4">Detail Pengiriman</h2>
        </div>
      </div>
      <form action="<?php echo e(route('cekongkir')); ?>" enctype="multipart/form-data" id="locations">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="total_price" value="<?php echo e($totalPrice); ?>">
          <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-6">
              <div class="form-group">
                <label for="address_one">Alamat</label>
                <input
                  type="text"
                  class="form-control"
                  id="address_one"
                  name="address_one"
                  value="<?php echo e(Auth::user()->address_one); ?>"
                  required
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="address_two">Catatan</label>
                <input
                  type="text"
                  class="form-control"
                  id="address_two"
                  name="address_two"
                  value="<?php echo e(Auth::user()->address_two); ?>"
                />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="provinces_id">Provinsi</label>
                <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id" required>
                  <option v-for="province in provinces" :value="province.id">{{ province.name }}</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="regencies_id">Kota / Kabupaten</label>
                <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id" required>
                  <option v-for="regency in regencies" :value="regency.id">{{ regency.type }} {{ regency.name }}</option>
                </select>
                <select v-else class="form-control" name="" id=""></select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="zip_code">Kode Pos</label>
                <input
                  type="text"
                  class="form-control"
                  id="zip_code"
                  name="zip_code"
                  value="<?php echo e(Auth::user()->zip_code); ?>"
                  required
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="country">Country</label>
                <input
                  type="text"
                  class="form-control"
                  id="country"
                  name="country"
                  value="Indonesia"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone_number">Mobile</label>
                <input
                  type="text"
                  class="form-control"
                  id="phone_number"
                  name="phone_number"
                  value="<?php echo e(Auth::user()->phone_number); ?>"
                  required
                />
              </div>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="250">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Detail Pembayaran</h2>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
              <div class="product-title-pembayaran">Rp. <?= number_format($totalPrice, '0', ',', '.' ?? 0)?></div>
              <div class="product-subtitle-pembayaran">Total Belanja Anda</div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
              <button
                  class="btn btn-success px-4 mt-2 btn-block"
                  >Pilih Jasa Pengiriman
                </button>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
              <a
                href="/"
                class="btn btn-primary px-4 mt-2 btn-block"
                >Kembali Belanja
              </a>
            </div>
          </div>
        </form>
    </div>
  </section>
  <!-- Akhir cart -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
<script src="/vendor/vue/vue.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  var locations = new Vue({
    el: "#locations",
    mounted() {
      AOS.init();
      this.getProvincesData();
    },
    data: {
      provinces: null,
      regencies: null,
      provinces_id: null,
      regencies_id: null,
    },
    methods: {
      getProvincesData() {
      var self = this;
        axios.get('<?php echo e(route('api-provinces')); ?>')
        .then (function(response){
          self.provinces = response.data;
        })
      },
      getRegenciesData(){
        var self = this;
        axios.get('<?php echo e(url('api/cities')); ?>/' + self.provinces_id)
        .then (function(response){
          self.regencies = response.data;
        })
      },
    },
    watch: {
      provinces_id: function(val, oldVal) {
        this.regencies_id = null;
        this.getRegenciesData();
      }
    }
  });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\belilo\resources\views/pages/cart.blade.php ENDPATH**/ ?>