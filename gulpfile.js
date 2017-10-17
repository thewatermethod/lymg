//npm install gulp gulp-clean gulp-concat gulp-uglify gulp-sourcemaps gulp-less gulp-minify-css run-sequence --save-dev

var gulp = require('gulp'),
	clean = require('gulp-clean'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify'),
	sourcemaps = require('gulp-sourcemaps'),
	less = require('gulp-less'),
	minifyCSS = require('gulp-minify-css'),
	runSequence = require('run-sequence'),
	watch = require('gulp-watch');

gulp.task( 'clean' , function() {
	return gulp.src('dist')
	.pipe( clean() );
});

gulp.task( 'cat-js', function(){
	return gulp.src(['js/*.js', '!js/npm.js','!js/customizer.js'])
		.pipe( concat('x.js') )
		.pipe( gulp.dest('dist') );
});

gulp.task( 'min-js', function(){
	return gulp.src('dist/x.js')
		.pipe( uglify() )
		.pipe( gulp.dest('dist') );
});

gulp.task('build-less', function(){
	return gulp.src(['style.less'])
		.pipe( sourcemaps.init() )
		.pipe( less() )
		.pipe( sourcemaps.write('dist/maps') ) 
		.pipe( gulp.dest('') );
});

gulp.task( 'cat-css', function(){
	return gulp.src(['css/*.css', 'style.css'])
		.pipe( concat('min.css') )
		.pipe( gulp.dest('') );
});

gulp.task('minify-css', function() {
  return gulp.src('dist/min.css')
    .pipe( sourcemaps.init() )
    .pipe( minifyCSS() )
    .pipe( sourcemaps.write() )
    .pipe( gulp.dest('dist') );
});

gulp.task( 'default', function(){
	runSequence(
		'clean',
		'build-less',
		['cat-js', 'cat-css'],
		['minify-css', 'min-js']
	);

});