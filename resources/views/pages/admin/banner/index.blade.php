@extends('layouts.admin')

@section('title')
    Banner
@endsection

@section('content')
<div
            data-aos="fade-up"
            class="section-content section-dashboard-home"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Banner</h2>
                <p class="dashboard-subtitle">Tax Center Marketplace</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <a href="{{ route('banner.create') }}" class="btn btn-primary mb-3">+ Tambah banner Baru</a>
                        <p class="text-danger">Ukuran Banner 1920px * 700px</p>
                        <div class="table-responsive">
                          <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable" >
                            <thead>
                              <tr>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
@endsection

@push('addon-script')
    <script>
      var datatable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
          url: '{!! url()->current() !!}',
        },
        columns: [
          {data: 'name', name: 'name'},
          {data: 'photo', name: 'photo'},
          {
            data: 'action',
            name: 'action',
            orderable: false,
            serachable: false,
            width: '15%'
          },
        ]
      })
    </script>
@endpush