@extends('layouts.dashboard')

@section('content')
    <div class="auth-keys module">
        <passport-clients></passport-clients>
        <passport-authorized-clients></passport-authorized-clients>
        <passport-personal-access-tokens></passport-personal-access-tokens>
    </div>
@endsection
