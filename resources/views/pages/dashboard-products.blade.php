@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
<div id="page-content-wrapper">
  <!-- Section content -->
  <div
    data-aos="fade-up"
    class="section-content section-dashboard-home"
  >
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Produk Saya</h2>
        <p class="dashboard-subtitle">Atur dan lihat perkembangannya</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            <a
              href="{{ route('dashboard-product-create') }}"
              class="btn btn-success"
            >
              Tambah Produk Baru
            </a>
            <div class="row mt-4">
              @php
              $incrementCategory = 0 
              @endphp
              @forelse ($products as $product)
              <div
                class="col-6 col-md-4 col-lg-2"
                data-aos="fade-up"
                data-aos-delay="{{ $incrementCategory += 100 }}">
                <a href="{{ route('dashboard-product-details', $product->id) }}" class="components-products d-block">
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
                  
                </div>
              @empty
              <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                Produk Tidak Ditemukan
              </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push("addon-script")
<script src="https://cdnjs.cloudflare.com/ajax/libs/clamp-js/0.7.0/clamp.js"></script>
<script>
    const modules = document.querySelectorAll('.products-text');
    
    // Make sure our query found anything
    if(modules) {
        // Loop through each module and apply the clamping.
        modules.forEach((module, index) => {
        $clamp(module, {clamp: 2});
    });
}
</script>
@endpush