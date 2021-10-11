@extends('layouts.dashboard')

@section('title')
    Pengaturan Toko
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
        <h2 class="dashboard-title">Pengaturan Toko</h2>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12 mt-3">
            <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Nama Toko</label>
                        <input type="text" name="store_name" value="{{ $user->store_name }}" class="form-control" required />
                      </div>
                    </div>
                    <div
                      class="col-md-12 text-center justify-content-center mt-3"
                    >
                      <div class="form-group">
                        <label for="">Status Toko</label>
                        <p class="text-muted">
                          Apakah anda ingin membuka toko?
                        </p>
                        <div
                          class="custom-control custom-radio custom-control-inline"
                        >
                          <input
                            type="radio"
                            class="custom-control-input"
                            name="store_status"
                            id="openStoreTrue"
                            value="1"
                            {{ $user->store_status == 1 ? 'checked' : '' }}
                          />
                          <label
                            for="openStoreTrue"
                            class="custom-control-label"
                          >
                            Buka
                          </label>
                        </div>
                        <div
                          class="custom-control custom-radio custom-control-inline"
                        >
                          <input
                            type="radio"
                            class="custom-control-input"
                            name="store_status"
                            id="openStoreFalse"
                            value="0"
                            {{ $user->store_status == 0 || $user->store_status == NULL ? 'checked' : '' }}
                          />
                          <label
                            for="openStoreFalse"
                            class="custom-control-label"
                          >
                            Sementara tutup
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-right">
                      <button
                        class="btn btn-success px-5"
                        type="submit"
                      >
                        Simpan
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
