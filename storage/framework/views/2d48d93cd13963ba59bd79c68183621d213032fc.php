

<?php $__env->startSection('title'); ?>
    Success
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content page-success">
  <div class="section-success" data-aos="zoom-in">
    <div class="container">
      <div class="row align-items-center row-login justify-content-center">
        <div class="col-lg-6 text-center">
          <img src="images/success.svg" class="mb-2" alt="" />
          <h2>Selamat datang di <strong>BeliLo</strong> UMKM!</h2>
          <p>
            Terima kasih banyak atas kepercayaan anda untuk bergabung di <strong>BeliLo</strong> kami dan berbelanja di <strong>BeliLo</strong>.
          </p>
          <div>
            <a href="<?php echo e(route('home')); ?>" class="btn btn-success w-50 mt-2"
              >Belanja Sekarang
            </a>
            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary w-50 mt-3"
              >Dashboard
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bwastore-laravel\resources\views/pages/success.blade.php ENDPATH**/ ?>