{{-- @extends('layouts.app')

@section('content')
<div class="container"> --}}

    <!DOCTYPE html>

    <!--
     // WEBSITE: https://themefisher.com
     // TWITTER: https://twitter.com/themefisher
     // FACEBOOK: https://www.facebook.com/themefisher
     // GITHUB: https://github.com/themefisher/
    -->
    
    <html lang="en">
    <head>
      <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
    
      <title>Mono - Responsive Admin & Dashboard Template</title>
    
      <!-- GOOGLE FONTS -->
      <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
      <link href="{{ asset('bootstap_Template/theme/plugins/material/css/materialdesignicons.min.css')}}" rel="stylesheet" />
      <link href="{{ asset('bootstap_Template/theme/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />
    
      <!-- PLUGINS CSS STYLE -->
      <link href="{{ asset('bootstap_Template/theme/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
      
      <!-- MONO CSS -->
      <link id="main-css-href" rel="stylesheet" href="{{ asset('bootstap_Template/theme/css/style.css')}}" />
    
      
    
    
      <!-- FAVICON -->
      <link href="{{ asset('bootstap_Template/theme/images/favicon.png')}}" rel="shortcut icon" />
    
      <!--
        HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
      -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="{{ asset('bootstap_Template/theme/plugins/nprogress/nprogress.js')}}"></script>
    </head>
    
    </head>
      <body class="bg-light-gray" id="body">
              <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
              <div class="d-flex flex-column justify-content-between">
                <div class="row justify-content-center">
                  <div class="col-lg-6 col-md-10">
                    <div class="card card-default mb-0">
                      <div class="card-header pb-0">
                        <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                          <a class="w-auto pl-0" href="/index.html">
                            <img src="bootstap_Template/theme/images/logo.png" alt="Mono">
                            <span class="brand-name text-dark">MONO</span>
                          </a>
                        </div>
                      </div>
                      <div class="card-body px-5 pb-5 pt-0">
    
                        <h4 class="text-dark mb-6 text-left">Sign in</h4>
    
                        <form method="POST" action="{{ route('login') }}">
                          @csrf
                          <div class="row">
                            <div class="form-group col-md-12 mb-4">
                              <input type="email" class="form-control input-lg @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" aria-describedby="emailHelp"
                                placeholder="email">


                            </div>
                            <div class="form-group col-md-12 ">
                              <input type="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="col-md-12">
    
                              <div class="d-flex justify-content-between mb-3">
    
                                <div class="custom-control custom-checkbox mr-3 mb-3">
                                  <input type="checkbox" class="custom-control-input" name="remember" id="remember"">
                                  <label class="custom-control-label" for="customCheck2">{{ __('Password') }}</label>
                                  {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}
                                </div>
    
             @if (Route::has('password.request'))
                                <a class="text-color" href="{{ route('password.request') }}">  {{ __('Forgot Your Password?') }} </a>

                                  
                                @endif
                              </div>
    
                              <button type="submit" class="btn btn-primary btn-pill mb-4">Sign In</button>
    
                                @if (Route::has('register'))
                                <li class="nav-item">
                              <p>Don't have an account yet ?
                                {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                                <a class="text-blue" href="{{ route('register') }}">Sign Up</a>
                                

                                </li>
                            @endif
                              </p>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
    </body>
    </html>
    

    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

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
    </div> --}}
{{-- </div>
@endsection --}}
