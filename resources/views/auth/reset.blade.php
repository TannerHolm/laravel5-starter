@extends('layout')

@section('content')
<section>
	<div class="row">
		<div class="large-5 medium-7 small-12 small-centered columns">
			<div class="radius panel">
				{!! Form::open(['action' => 'Auth\PasswordController@postReset']) !!}
			    {!! Form::hidden('token', $token) !!}
			
			    <div>
			    	{!! Form::label('email', 'Email') !!}
			      {!! Form::email('email', old('email')) !!}
			    </div>
			
			    <div>
			    	{!! Form::label('password', 'Password') !!}
						{!! Form::password('password') !!}
			    </div>
			
			    <div>
			    	{!! Form::label('password_confirmation', 'Confirm Password') !!}
			      {!! Form::password('password_confirmation') !!}
			    </div>
			
			    <div>
			      {!! Form::button('Reset Password', ['class' => 'radius button', 'type' => 'submit']) !!}
			    </div>
			  {!! Form::close() !!}
		</div>
	</div>
</section>
@stop