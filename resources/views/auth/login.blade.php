@extends('layouts.app')

@section('content')
<section class="section">
  <div class="container mt-5">
  <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
      <div class="card card-primary">
          <div class="card-header">
              <h4>Login</h4>
      </div>
          <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group row">
              <label for="email">Email</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              </div>

              <div class="form-group row">
              <label for="email">Password</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              </div>
              <div class="form-group row">
              <div class="custom-control custom-checkbox">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                  </label>
              </div>
              </div>
              <div class="form-group row">
              <button type="submit" class="form-control btn btn-primary">
                  {{ __('Login') }}
              </button>
              </div>
              <div class="text-center">
              @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
          @endif
              </div>
          </form>
          <div class="text-muted text-center">
              Don't have an account? <a clas="nav-link" href="{{ route('register') }}">Create One</a>
              </div>
          </div>
      </div>
      </div>
  </div>
  </div>
</section>
@endsection