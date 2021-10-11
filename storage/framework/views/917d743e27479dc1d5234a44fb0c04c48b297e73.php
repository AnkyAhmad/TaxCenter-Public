

<?php $__env->startSection('title'); ?>
    Pengaturan Toko
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
        <h2 class="dashboard-title">Pengaturan Toko</h2>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12 mt-3">
            <form action="<?php echo e(route('dashboard-settings-redirect', 'dashboard-settings-store')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Nama Toko</label>
                        <input type="text" name="store_name" value="<?php echo e($user->store_name); ?>" class="form-control" required />
                      </div>
                    </div>
                    <div
                      class="col-md-12 text-center justify-content-center mt-3"
                    >
                      <div class="form-group">
                        <label for="">Status Toko</label>
                        <p class="text-muted">
                          Apakah anda ingin membuka toko?
                        </p>
                        <div
                          class="custom-control custom-radio custom-control-inline"
                        >
                          <input
                            type="radio"
                            class="custom-control-input"
                            name="store_status"
                            id="openStoreTrue"
                            value="1"
                            <?php echo e($user->store_status == 1 ? 'checked' : ''); ?>

                          />
                          <label
                            for="openStoreTrue"
                            class="custom-control-label"
                          >
                            Buka
                          </label>
                        </div>
                        <div
                          class="custom-control custom-radio custom-control-inline"
                        >
                          <input
                            type="radio"
                            class="custom-control-input"
                            name="store_status"
                            id="openStoreFalse"
                            value="0"
                            <?php echo e($user->store_status == 0 || $user->store_status == NULL ? 'checked' : ''); ?>

                          />
                          <label
                            for="openStoreFalse"
                            class="custom-control-label"
                          >
                            Sementara tutup
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-right">
                      <button
                        class="btn btn-success px-5"
                        type="submit"
                      >
                        Simpan
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\belilo\resources\views/pages/dashboard-settings.blade.php ENDPATH**/ ?>