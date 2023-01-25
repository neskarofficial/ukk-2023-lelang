@extends('template.auth')

@section('title', 'Login')

@section('content')
<div id="auth-left">
  <div class="auth-logo">
      <a href="index.html"><img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo"></a>
  </div>
  <h1 class="auth-title">Log in.</h1>
  <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

  <form action="{{ route('login-petugas-auth') }}" method="POST">
    @csrf
      <div class="form-group position-relative has-icon-left mb-4">
          <input type="text" class="form-control form-control-xl" placeholder="Username" value="{{ old('username') }}" name="username">
          <div class="form-control-icon">
              <i class="bi bi-person"></i>
          </div>
          @error('username')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group position-relative has-icon-left mb-4">
          <input type="password" class="form-control form-control-xl" placeholder="Password" value="{{ old('password') }}" name="password">
          <div class="form-control-icon">
              <i class="bi bi-shield-lock"></i>
          </div>
          @error('username')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-check form-check-lg d-flex align-items-end">
          <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label text-gray-600" for="flexCheckDefault">
              Keep me logged in
          </label>
      </div>
      <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
  </form>
  <div class="text-center mt-5 text-lg fs-4">
      <p class="text-gray-600">Don't have an account? <a href="{{ route('register') }}" class="font-bold">Sign
              up</a>.</p>
  </div>
</div>
@endsection