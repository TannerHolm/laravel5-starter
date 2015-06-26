@extends('layout')

@section('content')
<section>
	<div class="row">
		<div class="large-5 medium-6 small-12 small-centered columns">
			<div class="radius panel">
				{!! Form::open(['acton' => 'Auth\AuthController@postLogin']) !!}
			    <div>
			      {!! Form::label('email', 'Email') !!}
			      {!! Form::email('email', old('email'), ['required']) !!}
			    </div>
			
			    <div>
			      {!! Form::label('password', 'Password') !!}
			      {!! Form::password('password') !!}
			    </div>
			
			    <div>
			    	{!! Form::checkbox('remember', null, false) !!}
			    	{!! Form::label('remember', 'Remember Me') !!}
			    </div>
			
			    <div>
			      {!! Form::button('Login', ['class' => 'radius button', 'type' => 'submit']) !!}
			    </div>
				{!! Form::close() !!}
				
				<div class="row">
					<div class="small-12 columns text-right">
						<a href="{!! URL::to('/password/email') !!}"><small>Forgot your password?</small></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop