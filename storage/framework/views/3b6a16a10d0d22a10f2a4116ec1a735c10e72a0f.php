

<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="page-content-wrapper">
  <!-- Section content -->
  <div
    data-aos="fade-up"
    class="section-content section-dashboard-home"
  >
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Produk Saya</h2>
        <p class="dashboard-subtitle">Atur dan lihat perkembangannya</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            <a
              href="<?php echo e(route('dashboard-product-create')); ?>"
              class="btn btn-success"
            >
              Tambah Produk Baru
            </a>
            <div class="row mt-4">
              <?php
              $incrementCategory = 0 
              ?>
              <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <div
                class="col-6 col-md-4 col-lg-2"
                data-aos="fade-up"
                data-aos-delay="<?php echo e($incrementCategory += 100); ?>">
                <a href="<?php echo e(route('dashboard-product-details', $product->id)); ?>" class="components-products d-block">
                  <div class="products-thumbnail">
                    <div
                      class="products-image"
                      style="
                            <?php if($product->galleries->count()): ?>
                              background-image: url('<?php echo e(Storage::url($product->galleries->first()->photos)); ?>')
                            <?php else: ?>
                              background-image: url(/images/default_product_image.jpg)
                            <?php endif; ?>
                            "                  
                    ></div>
                    </div>
                    <div class="products-text"><?php echo e($product->name); ?></div>
                    <div class="products-price">Rp. <?= number_format($product->price, '0', ',', '.') ?></div>
                </a>
                  
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                Produk Tidak Ditemukan
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush("addon-script"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clamp-js/0.7.0/clamp.js"></script>
<script>
    const modules = document.querySelectorAll('.products-text');
    
    // Make sure our query found anything
    if(modules) {
        // Loop through each module and apply the clamping.
        modules.forEach((module, index) => {
        $clamp(module, {clamp: 2});
    });
}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1358072/laravel/resources/views/pages/dashboard-products.blade.php ENDPATH**/ ?>