@extends('layouts.admin')

@section('content')
<div class="bd-login">
    <div class="wr">
        <div id="login-form" class="login-form module">
            @if ($errors->has('password'))
                <div class="messages">
                    <span class="icon icon-alert"></span>
                    <span>{{ $errors->first('password') }}</span>
                </div>
            @endif
            {{ Form::open(['route' => 'login']) }}
                {{ Form::token() }}
                <div class="email form-group">
                    {{ Form::email('email', old('email'), ['placeholder' => 'Email', 'required' => true]) }}
                </div>
                <div class="password form-group">
                    {{ Form::password('password', ['placeholder' => 'Password', 'required' => true]) }}
                </div>
                <div class="remember-me form-group">
                    {{ Form::checkbox('remember', old('remember')) }} Remember Me
                </div>
                <div class="login-btn submit-btn form-group">
                    {{ Form::button('LOG IN', ['class' => 'submit-button button', 'type' => 'submit']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
