

<?php $__env->startSection('title'); ?>
    Kategori
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content page-home">
  <!-- Awal categories -->
  <section class="store-trend-categories">
    <div class="container">
      <div class="row text-center">
        <div class="col-12 mb-2" data-aos="fade-up">
          <h5>Semua Kategori</h5>
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        <?php
          $incrementCategory = 0 
        ?>
        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div
        class="col-6 col-md-3 col-lg-2"
        data-aos="fade-up"
        data-aos-delay="<?php echo e($incrementCategory += 200); ?>"
        >
        <a href="<?php echo e(route('categories-detail', $category->slug)); ?>#perkategori" class="component-categories d-block">
          <div class="categories-image active">
            <img
              src="<?php echo e(Storage::url($category->photo)); ?>"
              class="w-100"
              alt=""
            />
          </div>
          <p class="categories-text"><?php echo e($category->name); ?></p>
        </a>
       </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
            Kategori Tidak Ditemukan
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <!-- AKhir categories -->

  <!-- Awal New Product -->
  <section class="store-new-products" style="padding-top: 4rem;" id="perkategori">
    <div class="container">
      <div class="row">
        <div class="col-5" data-aos="fade-up">
          <h5>Semua Produk</h5>
        </div>
        <div class="col-7 text-right">
          <ul class="dropdown">
            <a class="dropdown-toggle text-decoration-none"  style="color: #0c0d36;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Filter</a>
            <div class="dropdown-menu">
              <a href="<?php echo e(URL::current()."?sort=price_asc"); ?>" class="dropdown-item sort-font">Harga Terendah</a>
              <a href="<?php echo e(URL::current()."?sort=price_desc"); ?>" class="dropdown-item sort-font">Harga Tertinggi</a>
              <a href="<?php echo e(URL::current()."?sort=most_sold"); ?>" class="dropdown-item sort-font">Paling Banyak Terjual</a>
            </div>
          </ul>
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        <?php
        $incrementCategory = 0 
        ?>
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div
        class="col-6 col-md-4 col-lg-2"
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
          <a href="<?php echo e(route('toko', $product->user->slug_toko )); ?>" class="components-products d-block mb-4">
            <div class="products-store"><?php echo e($product->user->store_name); ?></div>
          </a>
          
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
          Produk Tidak Ditemukan
        </div>
        <?php endif; ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1358072/laravel/resources/views/pages/category.blade.php ENDPATH**/ ?>