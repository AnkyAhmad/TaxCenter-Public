@extends('layouts.auth')

@section('title')
    Verifikasi
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 8rem">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi email kamu') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Email Verifikasi baru telah dikirim ke email kamu.') }}
                        </div>
                    @endif

                    {{ __('Sebelum memulai cek inbox di email kamu untuk verifikasi.') }}
                    {{ __('Jika tidak menemukan email verifikasi') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klik disini') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
