@extends('layouts.dashboard')

@section('title')
    Dashboard Product
@endsection

@section('content')
<div
            data-aos="fade-up"
            class="section-content section-dashboard-home"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">Transaksi Baru</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Produk</div>
                        <div class="dashboard-card-subtitle"><?= number_format($products, '0', ',', '.') ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Omzet</div>
                        <div class="dashboard-card-subtitle">Rp <?= number_format($revenue, '0', ',', '.') ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-title">Transaksi</div>
                        <div class="dashboard-card-subtitle"><?= number_format($transaction_count, '0', ',', '.') ?></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12 mt-2">
                    
                    <h5 class="mb-3">Transaksi Baru</h5>
                    @foreach ($transaction_data as $transaction)
                      <a
                        href="{{ route('dashboard-transactions-details', $transaction->id) }}"
                        class="card card-list d-block"
                        >
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-1">
                              <img
                                src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                alt="" class="w-100"
                              />
                            </div>
                            <div class="col-md-3">{{ $transaction->product->name ?? '' }}</div>
                            <div class="col-md-4">{{ $transaction->transaction->user->name ?? '' }}</div>
                            <div class="col-md-3">{{ $transaction->shipping_status }}</div>
                            <div class="col-md-1 d-none d-md-block">
                              <img
                                src="/images/dashboard-arrow-right.svg"
                                alt=""
                              />
                            </div>
                          </div>
                        </div>
                      </a>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
        </div>
@endsection