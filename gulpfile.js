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

// Lint Task
gulp.task('lint', function() {
    return gulp.src('_/js/functions.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Bower task
gulp.task('bower', function() { 
    return bower()
         .pipe(gulp.dest('./bower_components')) 
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

// Browsersync
gulp.task('browser-sync', function() {
    browserSync({
        proxy: "localhost/diack",
        files: ["style.css", "_/js/*.js", "*.php", "*.html"]
    });
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src(['_/js-source/*.js'])
        .pipe(concat('theme.js'))
        .pipe(gulp.dest('_/dist'))
        .pipe(rename('theme.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('_/dist/'));
});


// Concatenate and minify third-party Bower scripts using main-bower-files
gulp.task('bower-minify-js', function() {
    return gulp.src(mainBowerFiles())
        .pipe(filter('*.js'))
        .pipe(concat('thirdparty.js'))
        .pipe(gulp.dest('_/dist'))
        .pipe(rename('thirdparty.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('_/dist/'));
});

// Concatenate and minify third-party Bower css using main-bower-files
gulp.task('bower-minify-css', function() {
    return gulp.src(mainBowerFiles())
        .pipe(filter('*.css'))
        .pipe(concat('thirdparty.css'))
        .pipe(gulp.dest('_/dist'))
        .pipe(rename('thirdparty.min.css'))
        .pipe(minifyCSS())
        .pipe(gulp.dest('_/dist/'));
});


// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('_/js-source/*.js', ['lint', 'scripts']);
    gulp.watch('_/scss/*.scss', ['sass']);
    gulp.watch('./bower_components', ['bower-minify-js', 'bower-minify-css'])
});

// Default Task
gulp.task('default', ['lint', 'sass', 'scripts', 'bower', 'browser-sync', 'bower-minify-js', 'bower-minify-css', 'watch']);
