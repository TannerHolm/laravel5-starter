<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
		<title>Laravel :: Foundation</title>
		{!! HTML::style(elixir('src/css/app.css')) !!}
		{!! HTML::script(elixir('src/js/modernizr.js')) !!}
	</head>
	<body>
		
		<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<li class="name"><h1><a href="/">WebApp</a></h1></li>
				<li class="toggle-topbar"><a href="/">Menu</a></li>
			</ul>
		
			<section class="top-bar-section">
				<!-- Right Nav Section -->
				<ul class="right">
					@if (Auth::check())
					<li><a href="#">You are logged in.</a></li>
					<li class="active"><a href="{!! URL::to('/auth/logout') !!}">Logout</a></li>
					@else
					<li><a href="#">You are not logged in.</a></li>
					<li class="active"><a href="{!! URL::to('/auth/login') !!}">Login</a></li>
					<li class="active"><a href="{!! URL::to('/auth/register') !!}">Register</a></li>
					@endif
				</ul>
			</section>
		</nav>
		
		@if (count($errors))		
			@foreach($errors->all() as $error)
			  <div data-alert class="alert-box warning ">
			  	{{ $error }}
			  	<a href="#" class="close">&times;</a>
			  </div>
			@endforeach
		@endif
	
		<main>
			@yield('content')
		</main>
		
		{!! HTML::script(elixir('src/js/app.js')) !!}
		
		{{-- Load in the Livereload script if we're in a development environment --}}
		@if ( env('APP_ENV') === 'development' ) 
			<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"></script>
		@endif
	</body>
</html>