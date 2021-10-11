@extends('layouts.app')

@section('title')
    Kategori
@endsection

@push('addon-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" type=""/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
@endpush

@section('content')
<div class="page-content page-home">
  <!-- Awal categories -->
  <section class="store-trend-categories">
    <div class="container">
      <div class="row text-center">
        <div class="col-12 mb-2" data-aos="fade-up">
          <h5>Semua Kategori</h5>
        </div>
      </div>
      <div class="row d-flex justify-content-center logo-slider">
        @php
          $incrementCategory = 0 
        @endphp
        @forelse ($categories as $category)
        <div
        class="col-12"
        data-aos="fade-up"
        data-aos-delay="{{ $incrementCategory += 200 }}"
        >
        <a href="{{ route('categories-detail', $category->slug) }}#perkategori" class="component-categories d-block">
          <div class="categories-image active">
            <img
              src="{{ Storage::url($category->photo) }}"
              class="w-100"
              alt=""
            />
          </div>
          <p class="categories-text">{{ $category->name }}</p>
        </a>
       </div>
        @empty
          <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
            Kategori Tidak Ditemukan
          </div>
        @endforelse
      </div>
    </div>
  </section>
  <!-- AKhir categories -->

  <!-- Awal New Product -->
  <section class="store-new-products" style="padding-top: 4rem;" id="perkategori">
    <div class="container">
      <div class="row">
        <div class="col-5" data-aos="fade-up">
          <h5>Semua Produk</h5>
        </div>
        <div class="col-7 text-right">
          <ul class="dropdown">
            <a class="dropdown-toggle text-decoration-none"  style="color: #0c0d36;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Filter</a>
            <div class="dropdown-menu">
              <a href="{{ URL::current()."?sort=price_asc" }}" class="dropdown-item sort-font">Harga Terendah</a>
              <a href="{{ URL::current()."?sort=price_desc" }}" class="dropdown-item sort-font">Harga Tertinggi</a>
              <a href="{{ URL::current()."?sort=most_sold" }}" class="dropdown-item sort-font">Paling Banyak Terjual</a>
            </div>
          </ul>
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        @php
        $incrementCategory = 0 
        @endphp
        @forelse ($products as $product)
        <div
        class="col-6 col-md-4 col-lg-2"
        data-aos="fade-up"
        data-aos-delay="{{ $incrementCategory += 100 }}">
        <a href="{{ route('detail', $product->slug) }}" class="components-products d-block">
          <div class="products-thumbnail">
            <div
              class="products-image"
              style="
                    @if ($product->galleries->count())
                      background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                    @else
                      background-image: url(/images/default_product_image.jpg)
                    @endif
                    "                  
            ></div>
            </div>
            <div class="products-text">{{ $product->name }}</div>
            <div class="products-price">Rp. <?= number_format($product->price, '0', ',', '.') ?></div>
        </a>
          <a href="{{ route('toko', $product->user->slug_toko ) }}" class="components-products d-block mb-4">
            <div class="products-store">{{ $product->user->store_name }}</div>
          </a>
          
        </div>
        @empty
        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
          Produk Tidak Ditemukan
        </div>
        @endforelse
      </div>
      <div class="row">
        <div class="col-12 mt-4">
          {{ $products->links() }}
        </div>
      </div>
    </div>
  </section>
  <!-- AKhir New Product -->
</div>
@endsection

@push('addon-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous"></script>
<script>
  $('.logo-slider').slick({
    slidesToShow : 6,
    slidesToScroll: 3,
    dots: true,
    arrows: true,
    autoplay: true,
    infinite: true,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ],
  });
</script>
<script>
  if ($(window).width() < 768) {
    $('.slick-arrow').remove();
  }
</script>
@endpush