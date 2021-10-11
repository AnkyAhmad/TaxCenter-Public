<?php $__env->startSection('title'); ?>
    Login
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="page-content page-auth">
    <div class="section-store-auth" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center row-login mt-5">
          <div class="col-lg-6 text-center">
            <img
              src="/images/login-placeholder.png"
              class="w-50 mb-4 mb-lg-none"
              alt=""
            />
          </div>
          <div class="col-lg-5">
            <h2>
              Belanja kebutuhan utama,
              menjadi lebih mudah
            </h2>
            <form method="POST" action="<?php echo e(route('login')); ?>" class="mt-3">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <label for="">Email</label>
                <input id="email" type="email" class="form-control col-sm-12 col-lg-9 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e('Email/Password Salah'); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="form-group">
                <label for="">Password</label>                
                <input id="password" type="password" class="form-control col-sm-12 col-lg-9 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e('Password tidak sesuai'); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="remember">
                        <?php echo e(__('Remember Me')); ?>

                    </label>
                </div>
              </div>
                <a class="text-decoration-none" href="<?php echo e(route('password.request')); ?>">
                    <?php echo e(__('Lupa password?')); ?>

                </a>
                                
              <button
                type="submit"
                class="btn btn-success btn-block col-sm-12 col-lg-9 mt-4"
                >Masuk</button
              >
              <a
                href="<?php echo e(route('register')); ?>"
                class="btn btn-secondary btn-block col-sm-12 col-lg-9 mt-2"
                >Daftar</a
              >
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1358072/laravel/resources/views/auth/login.blade.php ENDPATH**/ ?>