@extends('template.auth')

@section('title', 'Register')
    
@section('content')
<div id="auth-left">
  <div class="auth-logo">
      <a href=""><img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo"></a>
  </div>
  <h1 class="auth-title">{{ __('Sign Up') }}</h1>
  <p class="auth-subtitle mb-5">{{ __('Input your data to register to our website.') }}</p>

  <form action="{{ route('register-store') }}" method="POST">
      @csrf
      <div class="form-group position-relative has-icon-left mb-4">
          <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="form-control form-control-xl @error('name') is-invalid @enderror" placeholder="Name">
          <div class="form-control-icon">
              <i class="bi bi-person"></i>
          </div>
          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group position-relative has-icon-left mb-4">
          <input type="text" id="username" name="username" value="{{  old('username') }}" required autocomplete="name" autofocus class="form-control form-control-xl @error('name') is-invalid @enderror" placeholder="Username">
          <div class="form-control-icon">
              <i class="bi bi-person-circle"></i>
          </div>
          @error('username')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group position-relative has-icon-left mb-4">
        <input type="text" id="telepon" name="telepon" value="{{  old('telepon') }}" required autocomplete="name" autofocus class="form-control form-control-xl @error('name') is-invalid @enderror" placeholder="telepon">
        <div class="form-control-icon">
            <i class="bi bi-phone"></i>
        </div>
        @error('telepon')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
      <div class="form-group position-relative has-icon-left mb-4">
          <input type="password" id="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
          <div class="form-control-icon">
              <i class="bi bi-shield-lock"></i>
          </div>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group position-relative has-icon-left mb-4">
          <input type="password" id="password-confirm" class="form-control form-control-xl" placeholder="Confirm Password" required autocomplete="new-password">
          <div class="form-control-icon">
              <i class="bi bi-shield-lock"></i>
          </div>
      </div>
      <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{{ __('Sign Up') }}</button>
  </form>
  <div class="text-center mt-5 text-lg fs-4">
      <p class='text-gray-600'>Already have an account? <a href="{{ route('login') }}" class="font-bold">Log
              in</a>.</p>
  </div>
</div>
@endsection