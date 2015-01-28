// Include gulp and plugins
var gulp = require('gulp'),

    rename = require('gulp-rename'),
    bower = require('gulp-bower'),
    browserSync = require('browser-sync'),
    filter = require('gulp-filter'),
    mainBowerFiles = require('main-bower-files'),

// Scripts
    concat = require('gulp-concat'),
    uglify = require('gulp-uglifyjs'),
    jshint = require('gulp-jshint'),

// Styles
    compass = require('gulp-compass'),
    minifyCSS = require('gulp-minify-css'),
    autoprefixer = require('gulp-autoprefixer');

module.exports = gulp;

// Bower task
gulp.task('bower', function() { 
    return bower()
         .pipe(gulp.dest('bower_components/')) 
});

// Lint Task
gulp.task('lint', function() {
    return gulp.src('_/js/src/**/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Our Sass/Compass
gulp.task('sass', function() {
    return gulp.src('_/scss/*.scss')
        .pipe(compass({
            config_file: './config.rb',
            css: '.',
            sass: '_/scss'
        }))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'ff 17', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(gulp.dest('./'));

});

// Uglify, minify and sourcemap our scripts
gulp.task('scripts', function() {
  return gulp.src('_/js/src/**/*.js')
    .pipe(uglify('themefunctions.min.js', {
      outSourceMap: true,
      sourceRoot: '../'
    }))
    .pipe(gulp.dest('_/js/'));
});



// Concatenate and minify third-party Bower scripts using main-bower-files
gulp.task('bower-minify-js', function() {
    return gulp.src(mainBowerFiles())
        .pipe(filter('*.js'))
        .pipe(concat('thirdparty.js'))
        .pipe(gulp.dest('_/js/'))
        .pipe(rename('thirdparty.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('_/js/'));
});

// Concatenate and minify third-party Bower css using main-bower-files
gulp.task('bower-minify-css', function() {
    return gulp.src(mainBowerFiles())
        .pipe(filter('*.css'))
        .pipe(concat('thirdparty.css'))
        .pipe(gulp.dest('_/css/'))
        .pipe(rename('thirdparty.min.css'))
        .pipe(minifyCSS())
        .pipe(gulp.dest('_/css/'));
});



// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('_/js/src/**/*.js', [ 'scripts']);
    gulp.watch('_/scss/**/*.scss', ['sass']);
});

// Browsersync
gulp.task('browser-sync', function() {
    browserSync({
        proxy: "localhost/properbear",
        files: ["style.css", "_/js/**/*.js", "*.php", "*.html"]
    });
});

// Default Task
gulp.task('default', [ 'bower-minify-js', 'bower-minify-css', 'sass', 'scripts', 'watch', 'browser-sync' ]);
