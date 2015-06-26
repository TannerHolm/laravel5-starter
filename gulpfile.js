var gulp       = require('gulp');
var elixir     = require('laravel-elixir');
var livereload = require('gulp-livereload');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
  mix
  /* Compile the app.scss file to public/css/app.css */
  .sass('app.scss', 'public/src/css/app.css')
  
  /* Copy the Foundation JS folder from bower_components to a js/foundation folder */
  .copy('bower_components/foundation/js', 'resources/assets/js/foundation')
  
  /* Copy the Modernizr.js library into it's own file at public/js/modernizr.js */
  .scripts('foundation/vendor/modernizr.js', 'public/src/js/modernizr.js', 'resources/assets/js')
  
  /* Compile/Merge all of the js files to public/js/app.js */
	.scripts([
		/* Grab Fastclick.js and jQuery.js first */
		'foundation/vendor/fastclick.js',
		'foundation/vendor/jquery.js',
		
		/* Use the entire Foundation JS library */
		'foundation/foundation.js',
		
		/* Or use Foundation JS components individually */
		//'foundation/foundation/foundation.js',	
		//'foundation/foundation/foundation.abide.js',
		//'foundation/foundation/foundation.accordion.js',
		//'foundation/foundation/foundation.alert.js',
		//'foundation/foundation/foundation.clearing.js',
		//'foundation/foundation/foundation.dropdown.js',
		//'foundation/foundation/foundation.equalizer.js',
		//'foundation/foundation/foundation.interchange.js',
		//'foundation/foundation/foundation.joyride.js',
		//'foundation/foundation/foundation.magellan.js',
		//'foundation/foundation/foundation.offcanvas.js',
		//'foundation/foundation/foundation.orbit.js',
		//'foundation/foundation/foundation.reveal.js',
		//'foundation/foundation/foundation.slider.js',
		//'foundation/foundation/foundation.tab.js',
		//'foundation/foundation/foundation.tooltip.js',
		//'foundation/foundation/foundation.topbar.js',
		
		/* Finally, include your custom javascript file */
		'app.js'
		
	], 'public/src//js/app.js', 'resources/assets/js')
	
	/* Setup versioning for the app.css, app.js and modernizr.js files */
	.version(["src/css/app.css", "src/js/app.js", 'src/js/modernizr.js']);
});

/*
 |--------------------------------------------------------------------------
 | Logic for Livereload to work properly on watch task.
 |--------------------------------------------------------------------------
 */
gulp.on('task_start', function (e) {
  /* only start Livereload server if task is 'watch' */
  if (e.task === 'watch') {
    livereload.listen();
  }
});

gulp.task('watch-lr-css', function () {
  /* notify a CSS change, so that Livereload can update it without a page refresh */
  livereload.changed('app.css');
});

gulp.task('watch-lr', function () {
  /* notify any other changes, so that Livereload can refresh the page */
  livereload.changed('app.js');
});