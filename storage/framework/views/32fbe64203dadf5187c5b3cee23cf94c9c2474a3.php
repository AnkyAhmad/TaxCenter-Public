<?php $__env->startSection('title'); ?>
    Verifikasi
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 8rem">
            <div class="card">
                <div class="card-header"><?php echo e(__('Verifikasi email kamu')); ?></div>

                <div class="card-body">
                    <?php if(session('resent')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(__('Email Verifikasi baru telah dikirim ke email kamu.')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(__('Sebelum memulai cek inbox di email kamu untuk verifikasi.')); ?>

                    <?php echo e(__('Jika tidak menemukan email verifikasi')); ?>,
                    <form class="d-inline" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline"><?php echo e(__('Klik disini')); ?></button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1358072/public_html/laravel/resources/views/auth/verify.blade.php ENDPATH**/ ?>