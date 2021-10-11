

<?php $__env->startSection('title'); ?>
    Detail Transaksi
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
        <h2 class="dashboard-title">#<?php echo e($transaction->code); ?></h2>
        <p class="dashboard-subtitle">Transaksi Detail</p>
      </div>
      <div class="dashboard-content" id="transactionDetails">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-4">
                    <img
                      src="<?php echo e(Storage::url($transaction->product->galleries->first()->photos ?? '')); ?>"
                      alt=""
                      class="w-100 mb-3"
                    />
                  </div>
                  <div class="col-12 col-md-8">
                    <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="product-title">Nama Customer</div>
                        <div class="product-subtitle">
                          <?php echo e($transaction->transaction->user->name); ?>

                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Nama Produk</div>
                        <div class="product-subtitle">
                          <?php echo e($transaction->product->name); ?>

                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">
                          Tanggal Transaksi
                        </div>
                        <div class="product-subtitle"><?php echo e($transaction->created_at); ?></div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Status Pembayaran</div>
                        <div class="product-subtitle"><?php echo e($transaction->transaction->transaction_status); ?></div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Harga Barang</div>
                        <div class="product-subtitle">
                          Rp. <?= number_format($transaction->price, '0', ',', '.') ?>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Ongkir</div>
                        <div class="product-subtitle">
                          Rp. <?= number_format($transaction->transaction->shipping_price, '0', ',', '.') ?>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">No Handphone</div>
                        <div class="product-subtitle"><?php echo e($transaction->transaction->user->phone_number); ?></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-12">
                <h5>Informasi Pengiriman</h5>
              </div>
              <form action="<?php echo e(route('dashboard-transactions-update', $transaction->id)); ?>" id="someForm" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="col-12">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="product-title">Alamat</div>
                      <div class="product-subtitle">
                        <?php echo e($transaction->transaction->user->address_one); ?>

                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Catatan</div>
                      <div class="product-subtitle"><?php echo e($transaction->transaction->user->address_two); ?></div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Provinsi</div>
                      <div class="product-subtitle">
                        <?php echo e(App\Models\Province::find($transaction->transaction->user->provinces_id)->name ?? ''); ?>

                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Kota/Kabupaten</div>
                      <div class="product-subtitle">
                        <?php echo e(App\Models\Regency::find($transaction->transaction->user->regencies_id)->type ?? ''); ?> <?php echo e(App\Models\Regency::find($transaction->transaction->user->regencies_id)->name ?? ''); ?>

                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Kode Pos</div>
                      <div class="product-subtitle"><?php echo e($transaction->transaction->user->zip_code); ?></div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Negara</div>
                      <div class="product-subtitle"><?php echo e($transaction->transaction->user->country); ?></div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Status Pengiriman</div>
                      <div class="product-subtitle"><?php echo e($transaction->shipping_status ?? 'Belum Dikirm'); ?></div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Resi Pengiriman</div>
                      <div class="product-subtitle">JNE <?php echo e($transaction->resi ?? '--'); ?></div>
                    </div>
                    <?php if(Auth::user()->id == $transaction->transaction->user->id && $transaction->shipping_status == 'SHIPPING' ): ?>
                    <div class="col-12 col-md-3">
                      <div class="product-title">Konfirmasi Barang diterima</div>
                      <select name="shipping_status" id="status" class="form-control" v-model="status">
                        <option value="SUCCESS">Sampai</option>
                      </select>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-12 text-right">
                        <button class="btn btn-success btn-lg mt-4">Simpan</button>
                      </div>
                    </div>
                    <?php endif; ?>
                    <?php if(Auth::user()->id == $transaction->transaction->user->id && $transaction->shipping_status == 'SUCCESS' ): ?>
                      <div class="col-12">
                          <h5>Review Pembelian</h5>
                      </div>
                      <div class="col-12 col-md-12">
                        <input type="text" class="form-control" name="review" required value="<?php echo e($review->review ?? ''); ?>" />
                      </div>
                        <div class=" col-12 mt-4">
                          <div class="container d-flex justify-content-center mb-3">
                            <div class="star-review">
                              <input type="radio" value="1" name="stars" id="rate-1" <?php echo e($review->stars == 1 || $review->stars == NULL ? 'checked' : ''); ?>>
                              <label for="rate-1"> <i class="bi bi-star-fill"></i></label>

                              <input type="radio" value="2" name="stars" id="rate-2" <?php echo e($review->stars == 2 || $review->stars == NULL ? 'checked' : ''); ?>>
                              <label for="rate-2"><i class="bi bi-star-fill"></i></label>

                              <input type="radio" value="3" name="stars" id="rate-3" <?php echo e($review->stars == 3 || $review->stars == NULL ? 'checked' : ''); ?>>
                              <label for="rate-3"><i class="bi bi-star-fill"></i></label>

                              <input type="radio" value="4" name="stars" id="rate-4" <?php echo e($review->stars == 4 || $review->stars == NULL ? 'checked' : ''); ?>>
                              <label for="rate-4"><i class="bi bi-star-fill"></i></label>

                              <input type="radio" value="5" name="stars" id="rate-5" <?php echo e($review->stars == 5 || $review->stars == NULL ? 'checked' : ''); ?>>
                              <label for="rate-5"><i class="bi bi-star-fill"></i></label>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-md-12">
                          <form runat="server">
                            <div class="col-md-12 col-12">
                              <div class="gallery-container">
                                <img id="blah" src="#" alt=""/>
                              </div>
                            </div>
                          </form>
                          <input type="file" name="photo" class="form-control" style="display: none"  id="imgInp" />
                          <button
                            type="button"
                            class="btn btn-secondary btn-block mb-3 mt-3"
                            onclick="thisFileUpload()"
                          >
                            Foto Review
                          </button>
                        </div>
                    <div class="col-12 mb-5">
                    <button class="btn btn-success btn-block">
                      Kirim Review
                    </button>
                  </div>
                </div>
                    <?php endif; ?>
                    <?php if(Auth::user()->id == $transaction->product->user->id ): ?>
                    <div class="col-12 col-md-3">
                      <div class="product-title">Shipping Status</div>
                      <select name="shipping_status" id="status" class="form-control" v-model="status">
                        <option value="SHIPPING">Kirim</option>
                      </select>
                    </div>
                    <template v-if="status == 'SHIPPING'">
                      <div class="col-md-3">
                        <div class="product-title">Input Resi</div>
                        <input
                        type="text"
                        class="form-control"
                        name="resi"
                        v-model="resi"
                        />
                      </div>
                        <div class="col-md-12 text-right">
                        <button
                        type="submit"
                        class="btn btn-success btn-md mt-4"
                        >
                        Update Resi
                        </button>
                      </div>
                    </template>
                    
                    
                    </div>
                    <div class="row">
                      <div class="col-12 text-right">
                        <button class="btn btn-success btn-lg mt-4">Simpan</button>
                      </div>
                    </div>
                    <?php endif; ?>
                  <div class="row">
                       <p>    </p>
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
<script src="/vendor/vue/vue.js"></script>
<script>
  var transactionDetails = new Vue({
    el: "#transactionDetails",
    data: {
      status: "<?php echo e($transaction->shipping_status); ?>",
      resi: "<?php echo e($transaction->resi); ?>",
    },
  });
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
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\belilo\resources\views/pages/dashboard-transactions-details.blade.php ENDPATH**/ ?>