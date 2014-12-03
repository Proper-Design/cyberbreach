// Include gulp
var gulp = require('gulp');

module.exports = gulp;

// Include Our Plugins
var jshint = require('gulp-jshint');
var compass = require('gulp-compass');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var bower = require('gulp-bower');
var browserSync = require('browser-sync');
var filter = require('gulp-filter');
var mainBowerFiles = require('main-bower-files');
var uglify = require('gulp-uglifyjs');
var minifyCSS = require('gulp-minify-css');



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
        }));
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
