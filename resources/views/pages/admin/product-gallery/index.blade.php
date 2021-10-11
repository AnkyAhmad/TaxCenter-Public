@extends('layouts.admin')

@section('title')
    Product Gallery
@endsection

@section('content')
<div
            data-aos="fade-up"
            class="section-content section-dashboard-home"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Product Gallery</h2>
                <p class="dashboard-subtitle">Tax Center Marketplace</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <a href="{{ route('product-gallery.create') }}" class="btn btn-primary mb-3">+ Tambah Product Gallery Baru</a>
                        <div class="table-responsive">
                          <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable" >
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Nama Produk</th>
                                <th>Toko</th>
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
          {data: 'id', name: 'id'},
          {data: 'product.name', name: 'product.name'},
          {data: 'product.user.store_name', name: 'product.user.store_name'},
          {data: 'photos', name: 'photos'},
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