@extends('admin')

@section('content')
	<div class="bd-login">
		<div class="wr">
			<div id="login-form" class="login-form module">
	            @if(Session::has('message'))
	                <div class="messages">
                        <i class="icon icon-alert"></i>
	                    {{ session('message') }}
	                </div>
	            @endif
				{{ Form::open(array('route' => 'sessions.store')) }}
		            <div class="email form-group">
		                {{ Form::email('email', '', array('placeholder' => 'Email')) }}
		            </div>
		            <div class="password form-group">
						{{ Form::password('password', array('placeholder' => 'Password')) }}
		            </div>
		            <div class="login-btn submit-btn form-group">
		                {{ Form::button('LOG IN', array('class' => 'submit-button button')) }}
		            </div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
@endsection