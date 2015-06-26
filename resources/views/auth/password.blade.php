@extends('layout')

@section('content')
<section>
	<div class="row">
		<div class="large-5 medium-7 small-12 small-centered columns">
			<div class="radius panel">
				{!! Form::open(['action' => 'Auth\PasswordController@postEmail']) !!}
			    <div>
		        {!! Form::label('email', 'Email') !!}
		        {!! Form::text('email', old('email')) !!}
			    </div>
			
			    <div>
			      {!! Form::button('Send Password Reset Link', ['class' => 'radius button', 'type' => 'submit']) !!}
			    </div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</section>
@stop