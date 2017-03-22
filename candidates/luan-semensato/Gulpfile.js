/**
 *
 * Frontend Challenge - LKD
 *
 */

'use strict';

// Include Gulp & tools we'll use
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var del = require('del');
var runSequence = require('run-sequence');
var browserSync = require('browser-sync');
var spritesmith = require('gulp.spritesmith');

var AUTOPREFIXER_BROWSERS = [
  'ie >= 9',
  'ie_mob >= 10',
  'ff >= 30',
  'chrome >= 34',
  'safari >= 7',
  'opera >= 23',
  'ios >= 7',
  'android >= 4.0',
  'bb >= 10'
];

// Copy all files at the root level (app)
gulp.task('copy', function () {
  return gulp.src([
    // Ignore
    '!app/layouts/application.html',
    '!app/components',
    '!app/pages',
    '!app/*.html',
    '!app/assets/',

    'app/*',
    'node_modules/apache-server-configs/dist/.htaccess'
  ], {
    buffer: false,
    dot: true
  }).pipe(gulp.dest('dist'));
});

// Copy web fonts to dist
gulp.task('fonts', function () {
  return gulp.src(['app/assets/fonts/**'])
    .pipe(gulp.dest('dist/fonts'));
});

// images sprite
gulp.task('sprite', function () {
    var spriteData = gulp.src('app/assets/images/icons/*.png')
        .pipe(spritesmith({
            /* this whole image path is used in css background declarations */
            imgName: '../images/icons.png',
            cssName: 'icons.css'
        }));
    spriteData.img.pipe(gulp.dest('app/assets/images'));
    spriteData.css.pipe(gulp.dest('app/assets/styles'));
});

// Compile and automatically prefix stylesheets
gulp.task('styles', function () {
  // For best performance, don't add Sass partials to `gulp.src`
  return gulp.src([
    'app/assets/styles/*.{scss,sass}',
    'app/assets/styles/**/*.css'
  ])
    .pipe($.plumber({ errorHandler: $.notify.onError('Error: <%= error.message %>') }))
    .pipe($.changed('.tmp/styles'))
    .pipe($.sass({ precision: 10 }))
    .pipe($.cssimport())
    .pipe($.autoprefixer({ browsers: AUTOPREFIXER_BROWSERS }))
    .pipe($.if('*.css', $.minifyCss()))
    .pipe(gulp.dest('dist/styles'))
    .pipe(gulp.dest('.tmp/styles'))
    // Concatenate and minify styles
    .pipe(browserSync.stream())
    .pipe($.size({title: 'styles'}));
});

gulp.task('templates:build', ['templates:clean'], function () {
  return gulp.src(['app/pages/**/*.html'])
    .pipe($.plumber({ errorHandler: $.notify.onError('Error: <%= error.message %>') }))
    .pipe($.frontMatter())
    .pipe($.layout(function(file) {
      file.frontMatter.layout = 'app/layouts/application.html';
      file.frontMatter.engine = 'ejs';
      return file.frontMatter;
    }))
    .pipe($.hb({
      bustCache: true,
      partials: './app/components/**/*.hbs'
    }))
    .pipe(gulp.dest('.tmp'));
});

gulp.task('templates:clean', del.bind(null, ['.tmp/**/*.html', 'dist/**/*.html'], {dot: true}));

// Scan your HTML for assets & optimize them
gulp.task('html', function () {
  var assets = $.useref.assets({searchPath: '{.tmp,app,app/assets}'});

  return gulp.src('.tmp/**/*.html')
    .pipe(assets)
    // Concatenate and minify JavaScript
    .pipe($.if('*.js', $.uglify({preserveComments: 'some'})))
    .pipe(assets.restore())
    .pipe($.useref())
    // Minify any HTML
    .pipe($.if('*.html', $.minifyHtml()))
    // Output files
    .pipe(gulp.dest('dist'))
    .pipe(gulp.dest('.tmp'));
});

// Clean output directory
gulp.task('clean', function () {
  $.cache.clearAll();
  del.bind(null, ['.tmp', 'dist/*', '!dist/.git'], {dot: true});
});

// Watch files for changes & reload
gulp.task('serve', ['styles', 'sprite', 'templates:build'], function () {
  browserSync({
    notify: false,
    // Customize the BrowserSync console logging prefix
    logPrefix: 'FESK',
    // Run as an https by uncommenting 'https: true'
    // Note: this uses an unsigned certificate which on first access will present a certificate warning in the browser.
    // https: true,
    server: ['.tmp', 'app', 'app/assets', 'app/layouts']
  });

  gulp.watch(['app/**/*.{html,hbs}'], ['templates:build', browserSync.reload]);
  gulp.watch(['app/assets/styles/**/*.{scss,css}'], ['styles']);
});

// Build and serve the output from the dist build
gulp.task('serve:dist', ['default'], function () {
  browserSync({
    notify: false,
    logPrefix: 'FESK',
    // Run as an https by uncommenting 'https: true'
    // Note: this uses an unsigned certificate which on first access will present a certificate warning in the browser.
    // https: true,
    server: 'dist'
  });
});

// Build production files, the default task
gulp.task('default', function (cb) {
  runSequence('clean', ['styles', 'sprite', 'templates:build'], ['html', 'fonts', 'copy'], cb);
});
