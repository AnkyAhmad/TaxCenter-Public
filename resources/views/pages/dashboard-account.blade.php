@extends('layouts.dashboard')

@section('title')
    Dashboard Akun
@endsection

@section('content')
 <!-- Section Content -->

<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Akun Saya</h2>
      <p class="dashboard-subtitle">Info Profile Akun</p>
    </div>
      <div class="dashboard-content" data-aos="fade-up" >
        <img 
          src="/images/default_image_user.jpg" 
          alt="icon-user" 
          class="rounded w-25 float-left"
        >
        <form action="{{ route('dashboard-settings-redirect','dashboard-settings-account') }}" id="locations" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-12 col-lg-6 col-12">
            <div class="form-group">
              <label for="name">Nama</label>
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                value="{{ $user->name }}"
              />
            </div>
          </div>
          <div class="col-md-12 col-lg-6 col-12">
            <div class="form-group">
              <label for="name">No.Register UMKM</label>
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                value=""
              />
            </div>
          </div>
          <div class="col-md-12 col-lg-6 col-12">
            <div class="form-group">
              <label for="name">NIK</label>
              <input
                type="text"
                class="form-control"
                id=""
                name="nik"
                value=""
              />
            </div>
          </div>
          <div class="col-md-12 col-lg-6 col-12">
            <div class="form-group">
              <label for="name">NPWP</label>
              <input
                type="text"
                class="form-control"
                id="npwp"
                name="npwp"
                value="{{ $user->npwp }}"
              />
            </div>
          </div>
          <div class="col-md-12 col-lg-6 col-12">
            <div class="form-group">
              <label for="name">Nomor Handphone</label>
              <input
                type="text"
                class="form-control"
                id="phone_number"
                name="phone_number"
                value=""
              />
            </div>
          </div>
          <div class="col-md-12 col-lg-6 col-12">
            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                value="{{ $user->email }}"
              />
            </div>
          </div>
          <div class="col-md-12 col-lg-6 col-12">
            <div class="form-group">
              <label for="address_one">Alamat</label>
              <input
                type="text"
                class="form-control"
                id="address_one"
                name="address_one"
                value="{{$user->address_one }}"
              />
            </div>
          </div>
          <div class="col-md-12 col-lg-6 col-12">
            <div class="form-group">
              <label for="address_one">Nama Toko</label>
              <input
                type="text"
                class="form-control"
                id="store_name"
                name="store_name"
                value="{{$user->store_name }}"
              />
            </div>
          </div>
          {{-- EDIT LAGI --}}
          <div class="col-md-12 col-lg-6 col-12">
            <div class="form-group">
                <p  class="">
                    <strong>
                      PKP
                    </strong>
                </p>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="pkp_status" value="1">
                  <label class="form-check-label">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="pkp_status" value="0">
                  <label class="form-check-label">Tidak</label>
                </div>
            </div>
          </div>
          {{-- END EDIT LAGI --}}
            <div class="col-md-12 col-lg-6 col-12 mt-3">
              <div class="form-group">
                <h5>Lokasi Toko</h5>
              </div>
            </div>
            <div id="map" class="col-12 mb-2">
              <hr>
            </div>
            <div class="col-12 text-left">
              <button
                type="submit"
                class="btn btn-success px-5 mb-5"
              >
                Simpan Perubahan
              </button>
          </div>
        </div>
      </form>
      </div>
</div>
@endsection

@push('addon-script')
  <script>
    var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 6
});
var infoWindow = new google.maps.InfoWindow({map: map});

// Try HTML5 geolocation.
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };

        infoWindow.setPosition(pos);
        infoWindow.setContent('Location found.');
        map.setCenter(pos);
    }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
    });
} else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
                          'Error: The Geolocation service failed.' :
                          'Error: Your browser doesn\'t support geolocation.');
}
  </script>
@endpush


