@extends('layouts.app')

@section('title')
    Detail Barang
@endsection

@section('content')
<div class="page-content page-details">
  <!-- Awal Header -->
  <section
    class="store-breadcrumbs breadcrumb-divider"
    data-aos="fade-down"
    data-aos-delay="100"
  >
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('home') }}" class="text-decoration-none">Beranda</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('categories-detail', $product->category->slug) }}" class="text-decoration-none">{{ $product->category->name }}</a>
              </li>
              <li class="breadcrumb-item text-truncate active" style="max-width: 300px">{{ $product->name }}</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir Header -->

  <!-- Awal Product Details -->
  <section class="store-gallery" id="gallery">
    <div class="container">
      <div class="row h-75">
        <div class="col-lg-8" data-aos="zoom-in">
          <transition name="slide-fade" mode="out-in">
            <img
              :src="photos[activePhoto].url"
              :key="photos[activePhoto].id"
              class="w-100 main-image"
              alt=""
            />
          </transition>
        </div>
        <div class="col-lg-2">
          <div class="row">
            <div
              class="col-6 col-lg-12 mt-2 mt-lg-0"
              v-for="(photo, index) in photos"
              :key="photo.id"
              data-aos="zoom-in"
              data-aos-delay="100"
            >
              <a @click="changeActive(index)">
                <img
                  :src="photo.url"
                  class="w-100 thumbnail-image"
                  :class="{ active: index == activePhoto }"
                  alt=""
                />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir Product Details -->


  <div class="store-details-container" data-aos="fade-up">
    <section class="store-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mt-2">
                    <h1>{{ $product->name }}</h1>
                    <div class="price">Rp. {{number_format($product->price, '0', ',', '.') }}</div>
                </div>
                <div class="col-lg-2" data-aos="zoom-in">
                    @auth
                        <form action="{{ route('detail-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <button
                            type="submit"
                            href="/cart.html"
                            class="btn btn-success px-4 text-white btn-block mb-3"
                        >
                            Tambahkan ke keranjang
                        </button> 
                        @else
                        <a
                            href="{{ route('login') }}"
                            class="btn btn-success px-4 text-white btn-block mb-3"
                        >
                        Masuk untuk Belanja
                        </a> 
                    @endauth
                </div>
            </div>
            <div class="row">
                <div class="col-2 col-md-2 col-lg-1 bg-light border-right-0 p-2 ">
                <img
                    src="/images/default_image_user.jpg" 
                    alt="icon-user" 
                    class="rounded img-fluid"
                >
                </div>
                <div class="col-10 col-md-10 col-lg-3 bg-light p-2 ">
                    <h5 class="font-weight-light text-truncate" style="max-width: 300px;">
                        <strong> {{ $product->user->store_name ?? 'Toko Tax center' }}</strong>
                    </h5>
                    <h6 class="text-secondary text-lowercase font-weight-light text-truncate" style="max-width: 300px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#607d8b" class="bi bi-geo-alt-fill mr-1" viewBox="0 0 16 16">
                          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>
                        {{ App\Models\Regency::find($product->user->regencies_id)->type ?? ''}} {{ App\Models\Regency::find($product->user->regencies_id)->name ?? ''}}
                    </h6>
                    <h6 class="text-secondary font-weight-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#607d8b" class="bi bi-person-check-fill " viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                        {{ $product->user->created_at->format('d-m-Y') }}
                    </h6>
                </div>
                <div class="col-6 col-md-6 col-lg-2 bg-light py-4 text-center ">
                    <a class="btn btn-sm btn-outline-info" href="https://wa.me/62{{ $product->user->phone_number }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp mr-1" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                        </svg>
                        Hubungi Toko Penjual
                    </a>
                </div>
                <div class="col-6 col-md-6 col-lg-2 bg-light py-4 text-center">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('toko', $product->user->slug_toko ) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop-window mr-1" viewBox="0 0 16 16">
                            <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        Semua Produk Toko
                    </a>
                </div>
            </div>
        </div>
        <section section class="store-decription container">
          <div class="row">
              <div class="col-lg-8 col-md-8 col-12 p-0 mt-2">
                  <div class="card p-0">
                      <div class="card-body">
                      <h5 class="card-title bg-light p-3">Tentang Produk</h5>
                          <table>
                              <tr>
                                  <td class="align-baseline text-muted py-2 px-5">Kategori Product</td>
                                  <td class="align-text-bottom">{{ $product->category->name ?? '' }}</td>
                              </tr>
                              <tr>
                                  <td class="align-baseline text-muted py-2 px-5">Produk Terjual</td>
                                  <td class="align-text-bottom">({{number_format($product->transaction->count()) }})</td>
                              </tr>
                              <tr>
                                  <td class="align-baseline text-muted py-2 px-5">Stok Produk</td>
                                  <td class="align-text-bottom">({{number_format($product->stock - $product->transaction->count()) }})</td>
                              </tr>
                              <tr>
                                  <td class="align-baseline text-muted py-2 px-5">Dikirim Dari</td>
                                  <td class="align-text-bottom">{{ App\Models\Regency::find($product->user->regencies_id)->type ?? ''}} {{ App\Models\Regency::find($product->user->regencies_id)->name ?? ''}}</td>
                              </tr>
                              <tr>
                                  <td class="align-baseline text-muted py-2 px-5">Berat Produk</td>
                                  <td class="align-text-bottom">{{ $product->weight }} Gram</td>
                              </tr>
                              <tr>
                                <td class="align-baseline text-muted py-2 px-5">Rating Produk</td>
                                @if ($total_rating == NULL)
                                <td class="align-text-bottom">Belum ada pembelian</td>
                                @else
                                
                                <td class="align-text-bottom">{{ $total_rating/$total_review }} dari 5  <i class="bi bi-star-fill" style="color: #fd4"></td>
                                @endif
                              </tr>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          {{-- DESKRIPSI PRODUK --}}
          <div class="row">
              <div class="col-lg-8 col-md-8 col-12 p-0 mt-2">
                  <div class="card p-0">
                      <div class="card-body">
                          <h5 class="card-title bg-light p-3">
                              Deskripsi Produk
                          </h5>
                          <div class="card-title py-2 px-5 text-justify">
                             {!! $product->description !!}
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- Awal store review  -->
      <section class="store-review container">
        {{-- <div class="row">
            <div class="col-lg-8 col-md-8 col-12 p-0 mt-2">
                <div class="card p-0">
                    <div class="card-body">
                        <h5 class="card-title bg-light p-3">
                            Ulasan Produk ({{ $total_review }})
                        </h5>
                        <div class="card-title py-2 px-5 text-justify">
                          <div class="row">
                            @foreach ( $review as $reviews )
                            @if (!($reviews->review == NULL))
                            <div class="col-12">
                              <div class="img-review">
                                <img src="/images/testi/icons-testimonial-{{ mt_rand(1, 4) }}.png" class="mr-3 float-left" alt="...">
                                <div class="row">
                                    <div class="media-body">
                                      <div class="col-12">
                                        <h5 class="mt-2">{{ $reviews->user->name }}</h5>
                                      </div>
                                      <div class="row">
                                          <div class="col-12">
                                            <div class="star-review px-4">
                                              <input type="radio" id="rate-5" {{ $reviews->stars == 5 || $reviews->stars == NULL ? 'checked' : '' }}>
                                              <label for="rate-5"> <i class="bi bi-star-fill"></i></label>

                                              <input type="radio" id="rate-4" {{ $reviews->stars == 4 || $reviews->stars == NULL ? 'checked' : '' }}>
                                              <label for="rate-4"><i class="bi bi-star-fill"></i></label>

                                              <input type="radio" id="rate-3" {{ $reviews->stars == 3 || $reviews->stars == NULL ? 'checked' : '' }}>
                                              <label for="rate-3"><i class="bi bi-star-fill"></i></label>

                                              <input type="radio" id="rate-2" {{ $reviews->stars == 2 || $reviews->stars == NULL ? 'checked' : '' }}>
                                              <label for="rate-2"><i class="bi bi-star-fill"></i></label>

                                              <input type="radio" id="rate-1" {{ $reviews->stars == 1 || $reviews->stars == NULL ? 'checked' : '' }}>
                                              <label for="rate-1"><i class="bi bi-star-fill"></i></label>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-12">
                                          <h6 class="px-4"> {{ $reviews->review }}</h6>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-12">
                                          <div class="px-4">
                                            <img
                                            src="{{ Storage::url($reviews->photo ?? '') }}"
                                            alt=""
                                            class=""
                                            />
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                            @endif
                            @endforeach
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

            <div class="row">
              <div class="col-lg-8 col-md-8 col-12 p-0 mt-2">
                  <div class="card p-0">
                      <div class="card-body">
                          <h5 class="card-title bg-light p-3">
                              Ulasan Produk ({{ $total_review }})
                          </h5>
                          <div class="card-title py-2 px-5">
                             @foreach ( $review as $reviews)
                              @if (!($reviews->review == NULL))
                              <div class="media border-bottom mb-4">
                               <img 
                                src="/images/testi/icons-testimonial-{{ mt_rand(1, 4) }}.png" 
                                class="mr-3" 
                                alt="..."
                              >
                              <div class="media-body">
                                <div class="row">
                                  <div class="col-12">
                                    <h5 class="mt-0 text-capitalize">{{ $reviews->user->name }}</h5>
                                  </div>
                                  <div class="col-12">
                                    <div class="media-star mt-0">
                                      <div class="star-review">
                                                <input type="radio" id="rate-5" {{ $reviews->stars == 5 || $reviews->stars == NULL ? 'checked' : '' }}>
                                                <label for="rate-5"> <i class="bi bi-star-fill"></i></label>

                                                <input type="radio" id="rate-4" {{ $reviews->stars == 4 || $reviews->stars == NULL ? 'checked' : '' }}>
                                                <label for="rate-4"><i class="bi bi-star-fill"></i></label>

                                                <input type="radio" id="rate-3" {{ $reviews->stars == 3 || $reviews->stars == NULL ? 'checked' : '' }}>
                                                <label for="rate-3"><i class="bi bi-star-fill"></i></label>

                                                <input type="radio" id="rate-2" {{ $reviews->stars == 2 || $reviews->stars == NULL ? 'checked' : '' }}>
                                                <label for="rate-2"><i class="bi bi-star-fill"></i></label>

                                                <input type="radio" id="rate-1" {{ $reviews->stars == 1 || $reviews->stars == NULL ? 'checked' : '' }}>
                                                <label for="rate-1"><i class="bi bi-star-fill"></i></label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <p>{{ $reviews->review }}</p>
                                    </div>
                                    @if (!($reviews->photo == NULL ))
                                    <div class="col-12">
                                      <img
                                        src="{{ Storage::url($reviews->photo) }}"
                                        alt=""
                                        class="{{ (!($reviews->photo == NULL ) ? 'border mb-4' : '') }} "
                                        style="min-width: 20vmin"
                                      />
                                    </div>
                                    @endif
                                </div>
                              </div>
                            </div>
                              @endif   
                             @endforeach
                          </div>
                      </div>
                  </div>
              </div>
          </div>



      </section>
      <!-- Akhir store review  -->
    </section>
  </div>
</div>
  <!-- Akhir deskripsi Product  -->
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.min.js"></script>
<script>
  var gallery = new Vue({
    el: "#gallery",
    mounted() {
      AOS.init();
    },
    data: {
      activePhoto: 0,
      photos: [
        @foreach ($product->galleries as $gallery)
          {
            id: {{ $gallery->id }},
            url: "{{ Storage::url($gallery->photos) }}",
          },
        @endforeach  
      ],
    },
    methods: {
      changeActive(id) {
        this.activePhoto = id;
      },
    },
  });
</script>
@endpush