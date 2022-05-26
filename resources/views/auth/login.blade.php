@extends('layouts.auth')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}"><b>Saga</b> Sosmed</a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{__('Sign in to start your session')}}</p>

                <form action="{{ route('login') }}" method="post" id="quickForm">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="{{__('Email')}}" name="email"
                               value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="{{__('Password')}}" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    {{__('Remember Me')}}
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">{{__('Sign In')}}</button>
                        </div>
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="{{ route('google-login') }}" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> {{__('Sign in using Google')}}
                    </a>
                </div>

                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">{{__('Register a new membership')}}</a>
                </p>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/js/auth/login.js"></script>
@endsection
