@extends('layouts.success')

@section('title')
    Success
@endsection

@section('content')
<div class="page-content page-success">
  <div class="section-success" data-aos="zoom-in">
    <div class="container">
      <div class="row align-items-center row-login justify-content-center">
        <div class="col-lg-6 text-center">
          <img src="images/success.svg" class="mb-2" alt="" />
          <h2>Selamat datang di <strong>BeliLo</strong> UMKM!</h2>
          <p>
            Terima kasih banyak atas kepercayaan anda untuk bergabung di <strong>BeliLo</strong> kami dan berbelanja di <strong>BeliLo</strong>.
          </p>
          <div>
            <a href="{{ route('home') }}" class="btn btn-success w-50 mt-2"
              >Belanja Sekarang
            </a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary w-50 mt-3"
              >Dashboard
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection