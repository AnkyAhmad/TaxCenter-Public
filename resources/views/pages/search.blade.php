@extends('layouts.app')

@section('title')
    Store Category
@endsection

@section('content')
<div class="page-content page-home">
  

  <!-- Awal New Product -->
  <section class="store-new-products" style="min-height: 14.5vh">
    <div class="container">
      <div class="row">
        <div class="col-5" data-aos="fade-up">
          <p>{{ $products->count() }} Product Found </p>
        </div>
        <div class="col-7 text-right">
          <div class="dropdown dropleft">
            <button class="btn btn-md  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Filter
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ URL::current()."?query=$query"."&sort=price_asc" }}">Harga Terendah</a>
              <a class="dropdown-item" href="{{ URL::current()."?query=$query"."&sort=price_desc" }}">Harga Tertinggi</a>
              <a class="dropdown-item" href="{{ URL::current()."?query=$query"."&sort=newest" }}">Terbaru</a>
            </div>
          </div>
      </div>
      </div>
      <div class="row">
        @php
        $incrementCategory = 0 
        @endphp
        @foreach ($products as $product)
          <div
          class="col-6 col-md-4 col-lg-3"
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
            <a href="{{ route('toko', $product->user->store_name ) }}" class="components-products d-block mb-4">
              <div class="products-store">{{ $product->user->store_name }}</div>
            </a>
            
          </div>
        @endforeach
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