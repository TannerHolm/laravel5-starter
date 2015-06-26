@extends('layout')

@section('content')
<section>
	<div class="row">
		<div class="small-12 columns">
			<h1>Hi, {{ $user->username }}</h1>
		</div>
	</div>
</section>
@stop