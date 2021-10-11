<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      id="zoom-default"
      data-aos="fade-down"
    >
      <div class="container-fluid">
        <a href="<?php echo e(route('home')); ?>" class="navbar-brand">
          <img src="/images/logotaxcenter.png" alt="Logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('home')); ?>"
                >Beranda<span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('categories')); ?>">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('about')); ?>">Tentang</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav><?php /**PATH /home/u1358072/public_html/laravel/resources/views/includes/navbar-auth.blade.php ENDPATH**/ ?>