

<?php $__env->startSection('title'); ?>
    Store Category
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content page-home">
  

  <!-- Awal New Product -->
  <section class="store-new-products">
    <div class="container">
      <div class="row">
        <div class="col-5" data-aos="fade-up">
          <p><?php echo e($products->count()); ?> Product Found </p>
        </div>
        <div class="col-7 text-right">
          <div class="dropdown dropleft">
            <button class="btn btn-md  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Filter
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo e(URL::current()."?query=$query"."&sort=price_asc"); ?>">Harga Terendah</a>
              <a class="dropdown-item" href="<?php echo e(URL::current()."?query=$query"."&sort=price_desc"); ?>">Harga Tertinggi</a>
              <a class="dropdown-item" href="<?php echo e(URL::current()."?query=$query"."&sort=newest"); ?>">Terbaru</a>
            </div>
          </div>
      </div>
      </div>
      <div class="row">
        <?php
        $incrementCategory = 0 
        ?>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div
          class="col-6 col-md-4 col-lg-3"
          data-aos="fade-up"
          data-aos-delay="<?php echo e($incrementCategory += 100); ?>">
          <a href="<?php echo e(route('detail', $product->slug)); ?>" class="components-products d-block">
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
            <a href="<?php echo e(route('toko', $product->user->store_name )); ?>" class="components-products d-block mb-4">
              <div class="products-store"><?php echo e($product->user->store_name); ?></div>
            </a>
            
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="row">
        <div class="col-12 mt-4">
          <?php echo e($products->links()); ?>

        </div>
      </div>
    </div>
  </section>
  <!-- AKhir New Product -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bwastore-laravel\resources\views/pages/search.blade.php ENDPATH**/ ?>