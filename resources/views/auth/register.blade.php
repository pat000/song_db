@extends('layouts.app')

@section('content')

<body class="bg-gradient-danger">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image" style="background-image: url({{asset('undraw_to_do_list_a49b.svg')}});background-position: center;background-size: contain;background-repeat-y: no-repeat;"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">

                <h2 class="h4 text-gray-900 mb-2"><img src="https://stunnerypp.com/wp-content/uploads/2018/05/logo-1-300x138.png" style="width: 45%;"></h2>
              </div>
              <form method="POST" class="user" action="{{ route('register') }}">
                        @csrf
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                   
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-user" name="name" value="{{ old('name') }}" required autofocus placeholder="{{ __('Name') }}">

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div>
                  
                </div>
                <div class="form-group">
                  
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-user" name="email" value="{{ old('email') }}" required placeholder="{{ __('E-Mail Address') }}">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    
                     <input id="password" type="password" class="form-control-user form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ __('Password') }}">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                  </div>
                  <div class="col-sm-6">
                    
                    <input id="password-confirm" type="password"  placeholder="{{ __('Confirm Password') }}" class="form-control form-control-user" name="password_confirmation" required>
                            
                  </div>
                </div>
                <button type="submit" class="btn btn-danger btn-user btn-block">
                  Register Account
                </button>
                
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="{{ route('password.request')}}">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


@endsection
