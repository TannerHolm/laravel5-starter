@extends('layout')

@section('content')
<section>
	<div class="row">
		<div class="large-5 medium-6 small-12 small-centered columns">
			<div class="radius panel">
				{!! Form::open(['action' => 'Auth\AuthController@postRegister']) !!}
			    <div class="col-md-6">
			    	{!! Form::label('username', 'Username') !!}
			      {!! Form::text('username', null) !!}
			    </div>
			
			    <div>
			      {!! Form::label('email', 'Email') !!}
			      {!! Form::email('email', null) !!}
			    </div>
			
			    <div>
			      {!! Form::label('password', 'Password') !!}
			      {!! Form::password('password') !!}
			    </div>
			
			    <div class="col-md-6">
			      {!! Form::label('password_confirmation', 'Confirm Password') !!}
			      {!! Form::password('password_confirmation') !!}
			    </div>
			
			    <div>
			      {!! Form::button('Register', ['class' => 'radius button', 'type' => 'submit']) !!}
			    </div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</section>
@stop