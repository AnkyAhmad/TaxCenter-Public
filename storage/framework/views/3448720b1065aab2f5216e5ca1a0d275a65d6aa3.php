

<?php $__env->startSection('title'); ?>
    Cekongkir
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
                <a href="<?php echo e(route('home')); ?>">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="<?php echo e(route('cart')); ?>">Cart</a>
              </li>
              <li class="breadcrumb-item active">Cek Ongkir</li>
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
      <div class="row" data-aos="fade-up" data-aos-delay="150">
        <div class="col-12">
          <h2 class="mb-4">Pilih Pengiriman</h2>
        </div>
      </div>
        <div class="container mt-2">
          <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-delay="200">
              <p>Ongkir dari <strong><?php echo e(App\Models\Regency::find($carts->product->user->regencies_id)->type ?? ''); ?> <?php echo e(App\Models\Regency::find($carts->product->user->regencies_id)->name ?? ''); ?></strong> Ke <strong><?php echo e(App\Models\Regency::find(Auth::user()->regencies_id)->type ?? ''); ?> <?php echo e(App\Models\Regency::find(Auth::user()->regencies_id)->name ?? ''); ?></strong></p>
            </div>
            <?php
            $incrementCategory = 0 
            ?>
            
            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $totalPrice = $r['total']
            ?>
            <form action="<?php echo e(route('checkout')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="total_price" value="<?php echo e($totalPrice); ?>">
              <div class="col-lg-3 col-md-5 col-12 mr-4" data-aos-delay="<?php echo e($incrementCategory += 100); ?>" data-aos="fade-up">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo e($nama_jasa); ?></h5>
                    <div class="row">
                      <div class="col-6 mb-2">
                        Layanan:
                      </div>
                      <div class="col-6 mb-2">
                        <p class="card-text"><?php echo e($r['service']); ?></p>
                      </div>
                      <div class="col-6 mb-2">
                        Perkiraan:
                      </div>
                      <div class="col-6 mb-2">
                        <p class="card-text"><?php echo e($r['etd']); ?> Hari</p>
                      </div>
                      <div class="col-6 mb-2">
                        Ongkir:
                      </div>
                      <div class="col-6 mb-2">
                        <p class="card-text">Rp. <?php echo e(number_format($r['biaya'], '0', ',', '.')); ?></p>
                      </div>
                      <div class="col-6 mb-2">
                        Belanja:
                      </div>
                      <div class="col-6 mb-2">
                        <p class="card-text">Rp. <?php echo e(number_format($carts->product->price, '0', ',', '.')); ?></p>
                      </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="row mt-1">
                      <div class="col-6">
                        <p class="card-text">
                          Total:
                        </p>
                      </div>
                      <div class="col-6">
                        <p class="card-text">
                          <strong>Rp. <?php echo e(number_format($r['total'], '0', ',', '.')); ?></strong>
                        </p>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success">PILIH</button>
                </div>
              </div>
            </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
    </div>
  </section>
  <!-- Akhir cart -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bwastore-laravel\resources\views/pages/cekongkir.blade.php ENDPATH**/ ?>