@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')

<div class="page-content page-auth">
    <div class="section-store-auth" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center row-login mt-5">
          <div class="col-lg-6 text-center">
            <img
              src="/images/login-placeholder.png"
              class="w-50 mb-4 mb-lg-none"
              alt=""
            />
          </div>
          <div class="col-lg-5">
            <h2>
              Belanja kebutuhan utama,
              menjadi lebih mudah
            </h2>
            <form method="POST" action="{{ route('login') }}" class="mt-3">
              @csrf
              <div class="form-group">
                <label for="">Email</label>
                <input id="email" type="email" class="form-control col-sm-12 col-lg-9 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ 'Email/Password Salah' }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Password</label>                
                <input id="password" type="password" class="form-control col-sm-12 col-lg-9 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ 'Password tidak sesuai' }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
              </div>
                <a class="text-decoration-none" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
                                
              <button
                type="submit"
                class="btn btn-success btn-block col-sm-12 col-lg-9 mt-4"
                >Masuk</button
              >
              <a
                href="{{ route('register') }}"
                class="btn btn-secondary btn-block col-sm-12 col-lg-9 mt-2"
                >Daftar</a
              >
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
