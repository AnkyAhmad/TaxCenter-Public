

<?php $__env->startSection('title'); ?>
    Dashboard Product
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div
            data-aos="fade-up"
            class="section-content section-dashboard-home"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">Transaksi Baru</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Produk</div>
                        <div class="dashboard-card-subtitle"><?= number_format($products, '0', ',', '.') ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Omzet</div>
                        <div class="dashboard-card-subtitle">Rp <?= number_format($revenue, '0', ',', '.') ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Transaksi</div>
                        <div class="dashboard-card-subtitle"><?= number_format($transaction_count, '0', ',', '.') ?></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12 mt-2">
                    
                    <h5 class="mb-3">Transaksi Baru</h5>
                    <?php $__currentLoopData = $transaction_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a
                        href="<?php echo e(route('dashboard-transactions-details', $transaction->id)); ?>"
                        class="card card-list d-block"
                        >
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-1">
                              <img
                                src="<?php echo e(Storage::url($transaction->product->galleries->first()->photos ?? '')); ?>"
                                alt="" class="w-100"
                              />
                            </div>
                            <div class="col-md-3"><?php echo e($transaction->product->name ?? ''); ?></div>
                            <div class="col-md-4"><?php echo e($transaction->transaction->user->name ?? ''); ?></div>
                            <div class="col-md-3"><?php echo e($transaction->shipping_status); ?></div>
                            <div class="col-md-1 d-none d-md-block">
                              <img
                                src="/images/dashboard-arrow-right.svg"
                                alt=""
                              />
                            </div>
                          </div>
                        </div>
                      </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bwastore-laravel\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>