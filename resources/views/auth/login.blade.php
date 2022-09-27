@extends('layouts.app')
@section('content')
    <link rel="shortcut icon" href="{{asset('public/images/logo.png')}}">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <br/>
            <br/>
            <br/>
            <br/>
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        @if(\Session::has('message'))
                            <p class="alert alert-info">
                                {{ \Session::get('message') }}
                            </p>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h1>
                                <div class="login-logo">
                                    <a href="#">
                                        <img  class="img-responsive" width="25%" style="margin-left: 150px;" src="{{asset('public/images/logo.png')}}" alt="Al Rehmat Hospital" >
                                        {{--<span style="font-size: 40px;color: #0A246A;margin-left: 50px;">Login</span>--}}
                                    </a>
                                </div>
                            </h1>
                            <br/>{{--<p class="text-muted">{{ trans('global.login') }}</p>--}}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input name="email" type="text" class="form-control" placeholder="{{ trans('global.login_email') }}">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input name="password" type="password" class="form-control" placeholder="{{ trans('global.login_password') }}">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <input type="submit" class="btn btn-primary px-4" value='{{ trans('global.login') }}'>
                                    <label class="ml-2">
                                        <input name="remember" type="checkbox" /> {{ trans('global.remember_me') }}
                                    </label>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                        {{ trans('global.forgot_password') }}
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
