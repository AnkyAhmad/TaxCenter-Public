

<?php $__env->startSection('title'); ?>
    Dashboard Add Product
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div
            data-aos="fade-up"
            class="section-content section-dashboard-home"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Create Product</h2>
                <p class="dashboard-subtitle">Create New Amazing Product</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Kategori</label>
                                <select
                                  name="category"
                                  class="form-control"
                                  id=""
                                >
                                  <option value="" disabled>
                                    Select category
                                  </option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Deskripsi Produk</label>
                                <textarea name="editor"></textarea>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label for="">Foto Produk</label>
                                <input type="file" class="form-control" />
                                <p class="text-muted">
                                  Kamu dapat memilih lebih dari 1 gambar
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col text-right mt-4">
                              <button
                                class="btn btn-success btn-block"
                                type="submit"
                              >
                                Tambah Produk
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace("editor");
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bwastore-laravel\resources\views/pages/dashboard-product-create.blade.php ENDPATH**/ ?>