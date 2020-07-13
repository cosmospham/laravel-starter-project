@extends('layouts.login')

@section('content')
    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-12 p-0">
                    <div class="lavalite-bg" style="background-image: url('../images/login-bg.jpg')">
                        <div class="lavalite-overlay row flex-row m-0">
                            <div class="col-xl-4 col-lg-6 col-md-7 mx-auto my-auto p-0 login-bg border-radius">
                                <div class="authentication-form mx-auto">
                                    <h3><img src="{{ url('/images/logo-sidebar.png') }}" alt=""></h3>
                                    <p>{{ trans('profile.welcomeMessage') }}</p>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                            <i class="ik ik-user"></i>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                            <i class="ik ik-lock"></i>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="sign-btn text-center">
                                            <button class="btn btn-theme">{{ trans('profile.login') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
