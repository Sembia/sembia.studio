/*!
 * UnderTasker
 * Copyright 2017 Tyler Rilling
 * Licensed under MIT (https://github.com/underlost/Undertasker/blob/master/LICENSE)
 */

// grab our packages
var gulp   = require('gulp'),
    child = require('child_process');
    jshint = require('gulp-jshint');
    sass = require('gulp-sass');
    sourcemaps = require('gulp-sourcemaps');
    concat = require('gulp-concat');
    autoprefixer = require('gulp-autoprefixer');
    cleanCSS = require('gulp-clean-css');
    rename = require('gulp-rename'); // to rename any file
    uglify = require('gulp-uglify');
    del = require('del');
    stylish = require('jshint-stylish');
    runSequence = require('run-sequence');
    coffee = require('gulp-coffee');
    gutil = require('gulp-util');
    imagemin = require('gulp-imagemin');
    git = require('gulp-deploy-git');
    argv = require('minimist')(process.argv.slice(2));

// Cleans the web dist folder
gulp.task('clean', function () {
    del(['dist/']);
});


// Copy fonts task
gulp.task('copy-fonts', function() {
    gulp.src('inc/fonts/**/*.{ttf,woff,eof,svg,eot,woff2,otf}')
    .pipe(gulp.dest('dist/fonts'));
    // Copy Font scss
    gulp.src('node_modules/components-font-awesome/scss/**/*.scss')
    .pipe(gulp.dest('inc/sass/font-awesome'));
    // Copy Font files
    gulp.src('node_modules/components-font-awesome/fonts/**/*.{ttf,woff,eof,svg,eot,woff2,otf}')
    .pipe(gulp.dest('dist/fonts'));
});

// Minify Images
gulp.task('imagemin', function() {
    gulp.src('inc/img/**/*.{jpg,png,gif,ico}')
	.pipe(imagemin())
	.pipe(gulp.dest('dist/img'))
});

// Copy components
gulp.task('copy-components', function() {
    gulp.src('node_modules/components-font-awesome/scss/**/*.*')
    .pipe(gulp.dest('inc/sass/font-awesome'));
    gulp.src('node_modules/bootstrap/scss/**/*.*')
    .pipe(gulp.dest('inc/sass/bootstrap'));
});

gulp.task('install', function(callback) {
    runSequence(
        'copy-components', 'copy-fonts', callback
    );
});

// Compile coffeescript to JS
gulp.task('brew-coffee', function() {
    gulp.src('inc/coffee/*.coffee')
        .pipe(coffee({bare: true}).on('error', gutil.log))
        .pipe(gulp.dest('inc/js/coffee/'))
});

// CSS Build Task
gulp.task('build-css', function() {
  return gulp.src('inc/sass/site.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
    }))
    .pipe(gulp.dest('dist/css'))
    .pipe(cleanCSS())
    .pipe(rename('site.min.css'))
    .pipe(gulp.dest('dist/css'))
    .on('error', sass.logError)
});

// Concat All JS into unminified single file
gulp.task('concat-js', function() {
    return gulp.src([
        //'node_modules/jquery/dist/jquery.min.js',
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/jquery.easing/js/jquery.easing.js',
        'node_modules/fullpage.js/dist/jquery.fullpage.js',
        //'inc/js/navigation.js',
        'inc/js/functions.js',
        // Coffeescript
        'inc/js/coffee/*.*',
    ])
    .pipe(sourcemaps.init())
        .pipe(concat('site.js'))
        .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest('dist/js'));
});

// configure the jshint task
gulp.task('jshint', function() {
    return gulp.src('inc/js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'));
});

// Shrinks all the js
gulp.task('shrink-js', function() {
    return gulp.src('dist/js/site.js')
    .pipe(uglify())
    .pipe(rename('site.min.js'))
    .pipe(gulp.dest('dist/js'))
});

// Default Javascript build task
gulp.task('build-js', function(callback) {
    runSequence('concat-js', 'shrink-js', callback);
});

// configure which files to watch and what tasks to use on file changes
gulp.task('watch', function() {
    gulp.watch('inc/js/**/*.js', ['build-js']);
    gulp.watch('inc/sass/**/*.scss', ['build-css' ] );
});

// Default build task
gulp.task('build', function(callback) {
    runSequence(
        'copy-fonts', 'imagemin',
        ['build-css', 'build-js'], callback
    );
});


// Default task will build the jekyll site, launch BrowserSync & watch files.
gulp.task('default', ['build', 'watch']);
