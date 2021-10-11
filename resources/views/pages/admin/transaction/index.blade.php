@extends('layouts.admin')

@section('title')
    Transaksi
@endsection

@section('content')
<div
            data-aos="fade-up"
            class="section-content section-dashboard-home"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Transaksi</h2>
                <p class="dashboard-subtitle">Tax Center Marketplace</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable" >
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Kode Transaksi</th>
                                <th>Pembeli</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Dibuat</th>
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
          {data: 'code', name: 'code'},
          {data: 'user.name', name: 'user.name'},
          {data: 'total_price', name: 'total_price', render: $.fn.DataTable.render.number(',','.',0,'Rp.')},
          {data: 'transaction_status', name: 'transaction_status'},
          {data: 'created_at', name: 'created_at'},
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