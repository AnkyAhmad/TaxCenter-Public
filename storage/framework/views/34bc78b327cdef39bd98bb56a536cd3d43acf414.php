

<?php $__env->startSection('title'); ?>
    Detail Transaksi
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div
            data-aos="fade-up"
            class="section-content section-dashboard-home"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Product</h2>
                <p class="dashboard-subtitle">Tax Center Marketplace</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-12">
                      <?php if($errors->any()): ?>
                          <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                          </div>
                      <?php endif; ?>
                    <div class="card">
                      <div class="card-body">
                        <form action="<?php echo e(route('product.update', $item->id)); ?>" method="POST" enctype="multipart/form-data">
                          <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="">Nama Product</label>
                                      <input type="text" name="name" class="form-control" value="<?php echo e($item->name); ?>" required>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="">Penjual</label>
                                      <select name="users_id" class="form-control">
                                        <option value="<?php echo e($item->users_id); ?>" selected><?php echo e($item->user->name); ?></option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="">Kategori</label>
                                      <select name="categories_id" class="form-control">
                                        <option value="<?php echo e($item->categories_id); ?>" selected><?php echo e($item->category->name); ?></option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="">Harga</label>
                                      <input type="number" name="price" class="form-control" value="<?php echo e($item->price); ?>"" required>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="">Deskripsi</label>
                                      <textarea name="description" id="editor"><?php echo $item->description; ?></textarea>
                                  </div>
                              </div>                            
                          </div>
                            <div class="row">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-success px-5">Save Now</button>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('addon-script'); ?>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace("editor");
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bwastore-laravel\resources\views/pages/admin/transaction/edit.blade.php ENDPATH**/ ?>