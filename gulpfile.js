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
  
  /* Copy the Modernizr.js library into it's own file at public/js/modernizr.js */
  .scripts('bower_components/foundation/js/vendor/modernizr.js', 'public/src/js/modernizr.js', './')
  
  /* Compile/Merge all of the js files to public/js/app.js */
	.scripts([
		/* Grab Fastclick.js and jQuery.js first */
		'bower_components/foundation/js/vendor/fastclick.js',
		'bower_components/foundation/js/vendor/jquery.js',
		
		/* Use the entire Foundation JS library */
		'bower_components/foundation/js/foundation.js',
		
		/* Or use Foundation JS components individually */
		//'bower_components/foundation/js/foundation/foundation.js',	
		//'bower_components/foundation/js/foundation/foundation.abide.js',
		//'bower_components/foundation/js/foundation/foundation.accordion.js',
		//'bower_components/foundation/js/foundation/foundation.alert.js',
		//'bower_components/foundation/js/foundation/foundation.clearing.js',
		//'bower_components/foundation/js/foundation/foundation.dropdown.js',
		//'bower_components/foundation/js/foundation/foundation.equalizer.js',
		//'bower_components/foundation/js/foundation/foundation.interchange.js',
		//'bower_components/foundation/js/foundation/foundation.joyride.js',
		//'bower_components/foundation/js/foundation/foundation.magellan.js',
		//'bower_components/foundation/js/foundation/foundation.offcanvas.js',
		//'bower_components/foundation/js/foundation/foundation.orbit.js',
		//'bower_components/foundation/js/foundation/foundation.reveal.js',
		//'bower_components/foundation/js/foundation/foundation.slider.js',
		//'bower_components/foundation/js/foundation/foundation.tab.js',
		//'bower_components/foundation/js/foundation/foundation.tooltip.js',
		//'bower_components/foundation/js/foundation/foundation.topbar.js',
		
		/* Finally, include your custom javascript file */
		'resources/assets/js/app.js'
		
	], 'public/src/js/app.js', './')
	
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
