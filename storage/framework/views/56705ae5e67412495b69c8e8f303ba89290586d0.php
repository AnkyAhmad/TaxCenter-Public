

<?php $__env->startSection('title'); ?>
    Toko
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content" 
    data-aos="fade-right" 
    data-aos-delay="100"
    
    >
  <div class="store-header">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-4 col-lg-4 store-img d-flex justify-content-center">
          <img src="/images/logo-customer.png" alt="Loading">
        </div>
        <div class="col-12 col-md-8 col-lg-4 mt-2">
          <p class="store-name"><?php echo e($user->store_name); ?></p>
          <p class="store-provinces"><i class="bi bi-geo-alt-fill" style="font-size: 1rem; color: #92258d;"></i> 
            <?php echo e(App\Models\Regency::find($user->regencies_id)->type ?? ''); ?> <?php echo e(App\Models\Regency::find($user->regencies_id)->name ?? ''); ?>

          </p>
          <p class="store-created"><i class="bi bi-calendar-check" style="font-size: 1rem; color: #92258d;"></i> 
            <?php echo e($user->created_at->format('d-m-Y')); ?>

          </p>
        </div>
        <div class="col-12 col-md-8 col-lg-4 mt-2">
          <a
          class="btn btn-outline-secondary mb-4"
          href="https://api.whatsapp.com/send?phone=62<?php echo e($user->phone_number); ?>&text=Saya%20tertarik%20untuk%20membeli%20produk%20ini%20segera."
          >Hubungi Penjual
          </a>
        </div>
      </div>
  </div>
</div>


  <!-- Awal New Product -->
  <section class="store-new-products">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          
        </div>
      </div>
      <div class="row">
        <?php
        $incrementCategory = 0 
        ?>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div
          class="col-6 col-md-2 col-lg-2"
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\belilo\resources\views/pages/toko.blade.php ENDPATH**/ ?>