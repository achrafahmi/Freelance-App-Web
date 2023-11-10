<link rel="stylesheet" href="{{asset('css/loginform.css')}}">
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-6">
        {{-- <h2 class="text-center">Login Page</h2> --}}
        <img src="Images/12081272_4855438.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-md-6">
        <h1 class="justify-content-center">{{ __('Register') }}</h1>
        <form class="form-login form-log" method="POST" action="{{ route('register') }}">
          @csrf
          <span class="input-span">
            <label for="username" class="label">{{ __('User Name') }}</label>
            <input id="username" type="text" class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
            @error('username')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </span>
          <span class="input-span">
            <label for="email" class="label">{{ __('Email Address') }}</label>
            <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </span>
          <span class="input-span">
            <label for="password" class="label">{{ __('Password') }}</label>
            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </span>
          <span class="input-span mb-3">
            <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </span>
          <button type="submit" class="submit">
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            &nbsp &nbsp &nbsp &nbsp &nbsp 
             &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            &nbsp &nbsp &nbsp &nbsp &nbsp
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
             
            {{ __('Register') }}
          </button>
        </form>
      </div>
    </div>
  </div>
  


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">  
                       
                        @csrf

                        <div class="row mb-3">
                            <label for="firstname" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="firstname" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="familyname" class="col-md-4 col-form-label text-md-end">{{ __('Family Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="familyname" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<br><br><br><br><br><br>
@endsection
