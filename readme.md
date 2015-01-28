#  HTML5 Reset WordPress Theme

HTML5 Reset is a simple set of *WordPress* best practices to get web projects off on the right foot.

## Some of the features:

1. A style sheet designed to strip initial styles from browsers, starting your development off with a blank slate.
2. Easy to customize — remove whatever you don't need, keep what you do.
3. Google Analytics and jQuery calls
4. Meta tags ready for population
5. Empty print and small-screen media queries
6. Modernizr.js [http://www.modernizr.com/](http://www.modernizr.com/) enables HTML5 compatibility with IE (and a dozen other great features)
7. [Prefix-free.js](http://leaverou.github.io/prefixfree/) allowing us to only use un-prefixed styles in our CSS
8. IE-specific classes for simple CSS-targeting
9. Google's Chrome Frame prompt for IE6 users
10. iPhone/iPad/iTouch icon snippets, plus social/app meta tags for Twitter, Facebook, Windows 8
11. Lots of other keen stuff

## Get the plain HTML theme:

https://github.com/murtaugh/HTML5-Reset

## Proper Bear specifics

We've built this theme to suit our front-end workflow, which uses Bower for package control and Gulp for build task running. To get this up and running:

- Ensure that you have node.js installed
- Install Gulp and the set of plugins we use `npm install -g gulp browser-sync gulp-bower gulp-compass gulp-concat gulp-filter gulp-jshint gulp-notify gulp-rename main-bower-files gulp-uglifyjs gulp-minify-css`
- Symlink the plugins to your theme directory `npm link gulp browser-sync gulp-bower gulp-compass gulp-concat gulp-filter gulp-jshint gulp-notify gulp-rename main-bower-files gulp-uglifyjs gulp-minify-css`
- Add your third party packages to `bower.json`
- Run Gulp! We recommend the Sublime Text package