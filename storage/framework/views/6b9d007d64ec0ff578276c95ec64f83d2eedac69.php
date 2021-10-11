

<?php $__env->startSection('title'); ?>
    Beranda
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content page-home" id="zoom-default"> 
    <!-- Awal carousel -->
    <section class="store-carousel">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12" style="height: auto">
            <div
              id="banner"
              class="carousel slide"
              data-ride="carousel"
              data-aos="fade-right"
            >
              <ol class="carousel-indicators">
                <li
                  data-target="#banner"
                  data-slide-to="0"
                  class="active"
                ></li>
                <li
                  data-target="#banner"
                  data-slide-to="1"
                ></li>
                <li
                  data-target="#banner"
                  data-slide-to="2"
                ></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <a href="https://twitter.com">
                    <img
                    src="images/Banner/1.jpg"
                    class="d-block w-100"
                    alt="..."
                  />
                  </a>
                  
                </div>
                <div class="carousel-item">
                  <img
                    src="images/Banner/2.jpg"
                    class="d-block w-100"
                    alt="..."
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="images/Banner/3.jpg"
                    class="d-block w-100"
                    alt="..."
                  />
                </div>
              </div>
              <a
                class="carousel-control-prev"
                href="#banner"
                role="button"
                data-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="sr-only">Previous</span>
              </a>
              <a
                class="carousel-control-next"
                href="#banner"
                role="button"
                data-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- AKhir carousel -->

    <!-- Awal categories -->
    <section class="store-trend-categories">
      <div class="container">
        <div class="row text-center">
          <div class="col-12 mb-2" data-aos="fade-up">
            <h5>Kategori Pilihan</h5>
          </div>
          <div class="container-fluid">
            <div class="row">
                <?php $incrementCategory = 0 ?>
                <?php foreach($categories as $key=>$category) { ?>    
                    <div
                        class="col-6 col-md-3 col-lg-2"
                        data-aos="fade-up"
                        data-aos-delay="<?php echo e($incrementCategory+= 100); ?>"
                    >
                        <a href="<?php echo e(route('categories-detail', $category->slug)); ?>#perkategori" class="component-categories d-block">
                        <div class="categories-image item <?php echo ($key == 0) ? "active" : ""; ?> categories-image">
                            <img src="<?php echo e(Storage::url($category->photo)); ?>" alt="" class="w-100" />
                        </div>
                        <p class="categories-text"><?php echo e($category->name); ?></p>
                        </a>
                    </div>
                <?php } ?>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- AKhir categories -->

    <!-- Awal New Product -->
    <section class="store-new-products">
      <div class="container-fluid mt-2">
        <div class="row text-center">
          <div class="col-12" data-aos="fade-up">
            <h5>Produk Baru</h5>
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
      </div>
    </section>
    <!-- AKhir New Product -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1358072/laravel/resources/views/pages/home.blade.php ENDPATH**/ ?>