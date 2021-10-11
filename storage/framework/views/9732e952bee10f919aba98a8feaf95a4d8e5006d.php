<?php $__env->startSection('title'); ?>
    Register
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="page-content page-auth" id="register">
    <div class="section-store auth" data-aos="fade-up">
      <div class="container" style="margin-top: 50px">
        <div class="row align-items-center justify-content-center row-login mt-4">
          <div class="col-lg-4">
            <h2>Memulai untuk jual beli dengan cara terbaru</h2>
            <form method="POST" action="<?php echo e(route('register')); ?>">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input id="name" 
                  type="text" 
                  class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                  name="name" 
                  value="<?php echo e(old('name')); ?>" 
                  required 
                  autocomplete="name" 
                  autofocus 
                  v-model="name">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                  </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="form-group">
                <label for="">Email</label>      
                <input id="email"
                  v-model="email" 
                  @change="checkForEmailAvailability()"
                  type="email" 
                  class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                  :class="{ 'is-invalid' : this.email_unavailable }"
                  name="email" 
                  value="<?php echo e(old('email')); ?>" 
                  required 
                  autocomplete="email">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <div class="input-group" id="show_hide_password">
                <input id="myInput" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                 <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                 </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                
              </div>
              </div>
              <div class="form-group">
                <label for="">Konfirmasi Password</label>
                <input id="password-confirm" type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password_confirmation" required autocomplete="new-password">

                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                 <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                 </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="form-group">
                <label for="">Store</label>
                <p class="text-muted">Apakah anda ingin membuka toko?</p>
                <div
                  class="custom-control custom-radio custom-control-inline"
                >
                  <input
                    type="radio"
                    class="custom-control-input"
                    name="is_store_open"
                    id="openStoreTrue"
                    v-model="is_store_open"
                    :value="true"
                  />
                  <label for="openStoreTrue" class="custom-control-label">
                    Ya
                  </label>
                </div>
                <div
                  class="custom-control custom-radio custom-control-inline"
                >
                  <input
                    type="radio"
                    class="custom-control-input"
                    name="is_store_open"
                    id="openStoreFalse"
                    v-model="is_store_open"
                    :value="false"
                  />
                  <label for="openStoreFalse" class="custom-control-label">
                    Tidak
                  </label>
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label for="">Nama Toko</label>
                  <input id="store_name" v-model="store_name" type="text" class="form-control <?php $__errorArgs = ['store_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="store_name" required autocomplete autofocus>
  
                  <?php $__errorArgs = ['store_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                   <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                   </span>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label for="">NPWP</label>
                  <input id="npwp" v-model="npwp" type="text" class="form-control <?php $__errorArgs = ['npwp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="npwp" required autocomplete autofocus>
                  <p class="text-muted mt-2">Belum Memiliki NPWP ? <span><a href="https://ereg.pajak.go.id/login">Klik Disini<a/></a></span></p>
  
                  <?php $__errorArgs = ['npwp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                   <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                   </span>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label for="provinces_id">Provinsi</label>
                  <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                    <option v-for="province in provinces" :value="province.id">{{ province.name }}</option>
                  </select>
                  <select v-else class="form-control" name="" id=""></select>
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label for="regencies_id">Kota/Kabupaten</label>
                  <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                    <option v-for="regency in regencies" :value="regency.id">{{ regency.type }} {{ regency.name }}</option>
                  </select>
                  <select v-else class="form-control" name="" id=""></select>
                </div>
              </div>
              <button type="submit" 
                  class="btn btn-success btn-block mt-4" 
                  :disabled="this.email_unavailable"
                >Daftar
              </button>
              <a href="<?php echo e(route('login')); ?>" class="btn btn-secondary btn-block mt-2"
                >Masuk Ke akun saya</a
              >
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
<script src="/vendor/vue/vue.min.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  Vue.use(Toasted);
  var register = new Vue({
    el: "#register",
    mounted() {
      AOS.init();
      this.getProvincesData();
    },
    data: {
      provinces: null,
      regencies: null,
      provinces_id: null,
      regencies_id: null,
    },
    methods: {
      checkForEmailAvailability: function() {
        var self = this;
        axios.get('<?php echo e(route('api-register-check')); ?>', {
          params: {
            email:this.email
          }
        })
        .then(function (respone) {
          if(respone.data == 'Available') {
            self.$toasted.show(
              "Email anda tersedia! Silahkan Lanjutkan",
              {
                position: "top-center",
                className: "rounded",
                duration: 1000,
              }
            );
            self.email_unavailable = false;
          
          }  else {
            self.$toasted.error(
              "Maaf, tampaknya email anda sudah teregister di sistem kami.",
              {
                position: "top-center",
                className: "rounded",
                duration: 1500,
              }
            );
            self.email_unavailable = true;
          }
          console.log(respone);
        });
      },
      getProvincesData() {
      var self = this;
        axios.get('<?php echo e(route('api-provinces')); ?>')
        .then (function(response){
          self.provinces = response.data;
        })
      },
      getRegenciesData(){
        var self = this;
        axios.get('<?php echo e(url('api/cities')); ?>/' + self.provinces_id)
        .then (function(response){
          self.regencies = response.data;
        })
      },
    },
    watch: {
      provinces_id: function(val, oldVal) {
        this.regencies_id = null;
        this.getRegenciesData();
      }
    },
    data() {
      return {
          name: "<?php echo e(old('name')); ?>",
          email: "<?php echo e(old('email')); ?>",
          is_store_open: false,
          store_name: "<?php echo e(old('store_name')); ?>",
          npwp: "<?php echo e(old('npwp')); ?>",
          provinces_id: "<?php echo e(old('provinces_id')); ?>",
          regencies: '',
          regencies_id: "<?php echo e(old('regencies_id')); ?>",
          email_unavailable: false
        }
    }, 
  });
</script> 
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1358072/laravel/resources/views/auth/register.blade.php ENDPATH**/ ?>