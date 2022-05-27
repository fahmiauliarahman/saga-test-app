@extends('layouts.auth')

<div class="register-box">
    <div class="register-logo">
        <a href="{{ url('/') }}"><b>Saga</b> Sosmed</a>
    </div>

    {{--    @if($errors->any())--}}
    {{--        <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
    {{--            <ul>--}}
    {{--                @foreach($errors->all() as $error)--}}
    {{--                    <li>{{ $error }}</li>--}}
    {{--                @endforeach--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--    @endif--}}

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="{{ route('register') }}" method="post" id="quickForm">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Full name" name="name"
                           value="{{ old('name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email"
                           value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Retype password"
                           name="password_confirmation">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="{{ route('google-login') }}" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google
                </a>
            </div>

            <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </div>
    </div>
</div>

@section('js')
    <script src="/js/auth/register.js"></script>
@endsection
