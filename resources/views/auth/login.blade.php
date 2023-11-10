<link rel="stylesheet" href="{{asset('css/loginform.css')}}">
@extends('layouts.app')

@section('content')
@if ($errors->has('blocked'))
    <div class="alert alert-danger">
        {{ $errors->first('blocked') }}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-6">
        {{-- <h2 class="text-center">Login Page</h2> --}}
        <img src="Images/12081272_4855438.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-md-6">
        <h1 class="justify-content-center">{{ __('Login') }}</h1>
        <form class="form-login form-log" method="POST" action="{{ route('login') }}">
         @csrf
        <span class="input-span">
        <label for="email" class="label">{{ __('Email Address') }}</label>
        <input type="email" name="email" id="email" class=" @error('email') is-invalid @enderror"   value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
        </span>
        <span class="input-span mb-3">
        <label for="password" class="label">{{ __('Password') }}</label>
        <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </span>
        @if (Route::has('password.request'))
                                    {{-- <a class="span" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a> --}}
                                @endif
                                <button type="submit" class="submit">
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                     &nbsp &nbsp &nbsp &nbsp &nbsp 
                                      &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                     &nbsp &nbsp &nbsp &nbsp &nbsp
                                     &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                     &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                     &nbsp         
                                     {{ __('Login') }}
                                </button>
        <span class="span">Don't have an account? <a href="{{route('register')}}">Sign up</a></span>
      </form>
</div>

    </div>

</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<br><br><br><br><br><br><br><br><br><br><br><br>    
@endsection

