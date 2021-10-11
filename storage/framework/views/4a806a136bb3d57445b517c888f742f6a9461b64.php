

<?php $__env->startSection('title'); ?>
    Omzet Toko
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Omzet</h2>
      <p class="dashboard-subtitle">Total Omzet Toko Kamu</p>
    </div>
    <div class="dashboard-content">
        <div class="border border-secondary p-2">
          <h4>Isi Periode Pembayaran Pajak</h4>
          <ul>
              <li>Tahun Pajak = 2021</li>
              <li>Bulan Penjualan = Maret</li>
          </ul>
        </div>
      <div class="container-fluid  mt-5">
        <form action="<?php echo e(route('dashboard-settings-redirect','dashboard-settings-account')); ?>" name="hitung" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-3 text-center  py-4 px-lg-5 rounded-top bg-primary text-light mb-2"><strong> Omzet Toko Online</strong></div>
          <div 
            class="col-sm-12 col-md-12 col-lg-9  py-4 px-lg-5 border-bottom mb-2">
            <input
              type="text"
              class="form-control"
              id="online"
              name=""
              value="<?php echo e($revenue); ?>"
              onkeyup="sum();"
              disabled
            />
          </div>

          <div class="col-sm-12 col-md-12 col-lg-3 text-center  py-4 px-lg-5 rounded-top bg-primary text-light mb-2"><strong> Omzet Toko Offline</strong></div>
          <div 
            class="col-sm-12 col-md-12 col-lg-9 text-center py-4 px-lg-5 border-bottom mb-2">
            <input
              type="text"
              class="form-control"
              id="offline"
              name="offline"
              value=""
              onkeyup="sum();"
            />
          </div>
          <div class="col-sm-12 col-md-12 col-lg-3 text-center  py-4 px-lg-5 rounded-top bg-primary text-light mb-2"><strong> Total Omzet Toko</strong></div>
          <div 
            class="col-sm-12 col-md-12 col-md-12 col-lg-9  py-4 px-lg-5 border-bottom mb-2">
            <input
              type="text"
              class="form-control"
              id="hasil"
              name="hasil"
              disabled
              
            />
          </div>
          <div class="col-sm-12 col-md-12 col-lg-3 text-center py-4 px-lg-5 rounded-top bg-primary text-light mb-2"><strong> Pajak Harus Di Bayar</strong></div>
          <div class="col-sm-6 col-md-3 col-lg-2 text-center py-4 px-lg-5 border-bottom mb-2">
            <h5><strong>0.5% X </strong></h5>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 text-center py-4 px-md-5  border-bottom mb-2">
            <input
              type="text"
              class="form-control"
              id="total"
              name="hasil"
              disabled
              
            />
          </div>
          <div class="col-sm-12 col-md-1 col-lg-1 text-center py-4 border-bottom mb-2">
            <h3><strong>=</strong></h3>
          </div>
          <div 
            class="col-sm-12 col-md-4 col-lg-3 text-center py-4 px-lg-5  border-bottom mb-2">
            <input
              type="text"
              class="form-control"
              id="totalakhir"
              name="online"
              value=""
              disabled
            /> 
          </div>
          <div class="col-sm-12 col-md-12 col-lg-3 text-center py-4 px-lg-5 rounded-top bg-danger text-light mb-2"><strong>Buat Kode biling</strong></div>
          <div class="col-sm-12 col-md-12 col-lg-9 text-center py-4 px-lg-5 border-bottom-mb-2"><button class="btn btn-success"> <a href="https://djponline.pajak.go.id/account/login" class="text-light"> Klik Disni</a></button></div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
<script>
  function sum() {
      var txtFirstNumberValue = document.getElementById('online').value;
      var txtSecondNumberValue = document.getElementById('offline').value;
      var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
      var pajak =  0.005 * parseInt(result);
      
      if (!isNaN(result)) {
         document.getElementById('hasil').value = result;
         document.getElementById('total').value = result;
         document.getElementById('totalakhir').value = pajak;
      }
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1358072/laravel/resources/views/pages/dashboard-omzet.blade.php ENDPATH**/ ?>