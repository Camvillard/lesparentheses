'use strict';

var gulp = require('gulp'),

  // sass/CSS processes
  bourbon = require('bourbon').includePaths,
  neat = require('bourbon-neat').includePaths,
  sass = require('gulp-sass'),
  postcss = require('gulp-postcss'),
  autoprefixer = require('autoprefixer'),
  mqpacker = require('css-mqpacker'),
  sourcemaps = require('gulp-sourcemaps'),
  cssminify = require('gulp-cssnano'),
  sassLint = require('gulp-sass-lint'),

  // utilities
  rename = require('gulp-rename'),
  notify = require('gulp-notify'),
  plumber = require('gulp-plumber');


// ----- utilities ----- //

function handleErrors() {

	var args = Array.prototype.slice.call(arguments);

	notify.onError({
		title: 'Task Failed [<%= error.message %>',
		message: 'See console.',
		sound: 'Sosumi' // See: https://github.com/mikaelbr/node-notifier#all-notification-options-with-their-defaults
	}).apply(this, args);

	gutil.beep(); // Beep 'sosumi' again

	// Prevent the 'watch' task from stopping
	this.emit('end');

}


// ----- CSS tasks ----- //


gulp.task('postcss', function() {

  return gulp.src('assets/sass/style.scss')

    // error handling
      .pipe(plumber({
        errorHandler: handleErrors
      }))

    // wrap tasks in a sourcemap
    .pipe( sourcemaps.init() )



    .pipe( sass({
      includePaths: [].concat( bourbon, neat ),
      errLogToConsole: true,
      outputStyle: 'expanded' // Options: nested, expanded, compact, compressed
    }))

    .pipe(postcss([
      autoprefixer({
        browsers: ['last 2 versions'],
      }),
      mqpacker({
        sort: true
      })
    ]))


    // creates the sourcemap
    .pipe(sourcemaps.write())


    .pipe (gulp.dest('./'));

});

/*gulp.task('autoprefixer', function() {

  return gulp.src( './style.css' )

    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe(gulp.dest('dist'));

});*/


gulp.task('css:minify', ['postcss'], function() {
  return gulp.src('style.css')

  // error handling
    .pipe(plumber({
      errorHandler: handleErrors
    }))


    .pipe(cssminify({
      safe: true
    }))
    .pipe(rename('style.min.css'))
    .pipe(gulp.dest('./'))

    .pipe(notify({
      message: 'styles are built, you are badass.'
    }))

});

gulp.task('sass:lint', ['css:minify'], function() {
  gulp.src([
    'assets/sass/style.scss',
    '!assets/sass/base/html5-reset/_normalize.scss',
    '!assets/utilities/animate/**/*.*'
  ])
    .pipe(sassLint())
    .pipe(sassLint.format())
    .pipe(sassLint.failOnError())
});


gulp.task('watch', function () {
	gulp.watch('assets/sass/**/*.scss', ['styles']);
});

/**
* individual tasks
**/

// gulp.task('scripts', [''])
gulp.task('styles', ['sass:lint'] );
