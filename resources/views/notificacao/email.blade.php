@extends('adminlte::layouts.auth')

{{--@section('htmlheader_title')--}}
    {{--Password recovery--}}
{{--@endsection--}}

@section('content')

    <body class="login-page">
    <div id="app">

        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/home') }}"><b>IFG</b>News</a>
            </div><!-- /.login-logo -->


            <div class="login-box-body">
                <p class="login-box-msg">Reset Password</p>

                <email-reset-password-form></email-reset-password-form>

                <a href="{{ url('/login') }}">Log in</a><br>
                <a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a>

            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->
    </div>



@endsection
