@extends('layout.guest-master')

@section('content')
    <div id="login" style="margin-top:-90px;">
        <div class="form-wrapper md-elevation-8 p-8">
            <div style="padding-top:30px;">
                <img src="{{ asset('template/images/logos/sra.png') }}" style="width:135px;">
            </div>
            <div class="title mt-4 mb-8">Log in to your account</div>

            {!! Form::open(['route' => 'login.post' ,'class' => 'mt-8' ]) !!}

                {!! FormHelper::textBox(
                    '', 'mb-4', 'username', 'Username', 'text', 'username', old('username'), 'required', $errors->first('username'), ''
                ) !!}

                {!! FormHelper::textBox(
                    '', 'mb-4', 'password', 'Password', 'password', 'password', old('password'), 'required', $errors->first('password'), ''
                ) !!}

                {!! FormHelper::alert(Session::has('SESSION_AUTH_UNMATCH'), Session::get('SESSION_AUTH_UNMATCH'), 'danger') !!}
                {!! FormHelper::alert(Session::has('SESSION_AUTH_UNACTIVATED'), Session::get('SESSION_AUTH_UNACTIVATED'), 'danger') !!}
                {!! FormHelper::alert(Session::has('SESSION_AUTH_MULTI_LOG'), Session::get('SESSION_AUTH_MULTI_LOG'), 'danger') !!}

                {!! FormHelper::alert(Session::has('SESSION_AUTH_LOGOUT'), Session::get('SESSION_AUTH_LOGOUT'), 'danger') !!}
                {!! FormHelper::alert(Session::has('SESSION_AUTH_RESTRICT'), Session::get('SESSION_AUTH_RESTRICT'), 'danger') !!}

                <div class="remember-forgot-password row no-gutters align-items-center justify-content-between pt-4">
                    <div class="form-check remember-me mb-4">
                        <label class="form-check-label">
                            <input class="form-check-input" aria-label="Remember Me" type="checkbox">
                            <span class="checkbox-icon fuse-ripple-ready"></span>
                            <span class="form-check-description">Remember Me</span>
                        </label>
                    </div>
                    <a href="#" class="forgot-password text-secondary mb-4">Forgot Password?</a>
                </div>

                <button type="submit" class="submit-button btn m-4 fuse-ripple-ready submit-button btn btn-block btn-secondary my-4 mx-auto fuse-ripple-ready">     LOG IN
                </button>

            {!! Form::close() !!}

        </div>
    </div>
@endsection