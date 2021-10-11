

<?php $__env->startSection('title'); ?>
    Tambah Produk
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div
            data-aos="fade-up"
            class="section-content section-dashboard-home"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Buat Produk</h2>
                <p class="dashboard-subtitle">Buat Produk Yang Berkesan</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                          <ul>
                              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li><?php echo e($error); ?></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('dashboard-product-store')); ?>" method="POST" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="users_id" value="<?php echo e(Auth::user()->id); ?>">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" class="form-control" name="name" autofocus required/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" class="form-control" name="stock" required/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Harga Jual</label>
                                <input type="number" class="form-control" name="price" required/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Harga Modal</label>
                                <input type="number" class="form-control" name="harga_modal" required/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="categories_id" class="form-control">
                                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Berat (gram)</label>
                                <input type="number" class="form-control" name="weight" required/>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Deskripsi Produk</label>
                                <textarea name="description" id="editor" required></textarea>
                              </div>
                            </div>
                              <form runat="server">
                                <div class="col-md-4 col-12">
                                  <div class="gallery-container">
                                    <img id="blah" class="w-100" src="#" alt="your image" />
                                  </div>
                                </div>
                              </form>
                              <div class="col-12">
                                <input multiple type="file" name="photo" class="form-control" style="display: none"  id="imgInp" />
                                <button
                                  type="button"
                                  class="btn btn-secondary btn-block mt-3"
                                  onclick="thisFileUpload()"
                                >
                                   Tambah Foto
                                </button>
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
<script> src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js%22%3E"</script>
  <script>
    function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
  
      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }
  
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  
  $("#imgInp").change(function() {
    readURL(this);
  });
  </script>
  <script>
    function thisFileUpload() {
      document.getElementById("imgInp").click();
    }
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\belilo\resources\views/pages/dashboard-products-create.blade.php ENDPATH**/ ?>