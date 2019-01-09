@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-6">
        {{-- admin login page side image card --}}
            @isset($url)
                <div class="card border-0 ml-5 mt-5" style="max-width: 50rem;">
                    <img class="card-img-top" src="/storage/misc_images/admin_login_side.jpg" alt="Card image cap" style="opacity: 0.8; filter: alpha(opacity=80);">
                    <div class="card-body">
                        <h5 class="card-title">Welcome to Kodiak Platform</h5>
                        <p class="card-text text-muted">Please use your logins</p>
                    </div>
                </div>

            @else
            {{-- advertiser login page side image card --}}
                <div class="card border-0 ml-5 mt-5" style="max-width: 50rem;">
                    <img class="card-img-top" src="/storage/misc_images/login_side.jpg" alt="Card image cap" style="opacity: 0.8; filter: alpha(opacity=80);">
                    <div class="card-body">
                        <h5 class="card-title">Welcome to Kodiak Platform</h5>
                        <p class="card-text text-muted">If you want to promote your <b>offer</b>:</p>
                        <p class="card-text text-muted">have login portals for each business/organization so you can upload the promotions from your side. You have the freedom to choose what to be promoted and the number of dates which the promotion to be on the website. <b>You can decide the entire marketing campaign.</b></p>
                    </div>
                </div>
            @endisset
        </div>
        <div class="col-md-6 align-self-center">
            <div class="card border-0" style="max-width: 50rem; height:25rem">
                <div class="card-header bg-transparent border-bottom mb-5"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>

                <div class="card-body">

                    {{--If login as admin change action--}}
                @isset($url)
                    <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                @else

                    {{-- Advertiser login --}}
                    <form method="POST" action="{{ route('login') }}">

                @endisset

                    @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-lg btn-block btn-dark">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
