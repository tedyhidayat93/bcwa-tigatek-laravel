@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col-md-7 vh-100 d-none d-md-flex align-items-center justify-content-center bg-auth">
    </div>
    <div class="col-md-5 vh-100 d-flex align-items-center justify-content-center px-4 px-md-5 bg-white">
        <div class="card border-0 bg-transparent shadow-none" style="width:100%;">
            <div class="card-body bg-transparent py-3 px-3 px-md-5">
                <div class="d-flex align-items-center justify-content-between w-100 rounded">
                    <img src="{{$path_logo}}" class="rounded w-25 mr-3">
                    <div class="text-right pt-3">
                        <h4 class="font-weight-bold text-dark mb-0">{{$brand_name}}</h4>
                        <p class="text-medium-emphasis text-md">{{$brand_tagline}}</p>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('login') }}" class="mt-4">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email" class="col-form-label text-sm font-weight-normal text-md-end">{{ __('Email') }}</label>
                        <input id="email" type="email" class="shadow form-control text-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="yourmail@mail.com" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="col-form-label text-sm font-weight-normal text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password" class="shadow form-control text-sm @error('password') is-invalid @enderror" name="password" required placeholder="* * * * * * * * *">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" value="1" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label text-sm" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn bg-warning w-100 mt-3 shadow">
                        <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                    </button>
                    {{-- <div class="row mb-0">
                        <div class="col-md-12">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</div>

@endsection