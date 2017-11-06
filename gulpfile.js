// Grab our gulp packages
var gulp  = require('gulp'),
    gutil = require('gulp-util'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    cssnano = require('gulp-cssnano'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    browserSync = require('browser-sync'),
    plumber = require('gulp-plumber'),
    bower = require('gulp-bower');
    imageop = require('gulp-image-optimization');
    babel = require('gulp-babel'),
    phpcs = require('gulp-phpcs'),
    argv = require('yargs').argv;

var $ = require('gulp-load-plugins')();
var config = {
     sassPath: './resources/sass',
     bowerDir: './bower_components' 
}

var URL = 'pineapple.dev/';

var PATHS = {
  phpcs: [
    '**/*.php',
    '!wpcs',
    '!wpcs/**',
  ]
};  

gulp.task('browser-sync', ['styles'], function() {

    var files = [
            'assets/css/*.css',
            '**/*.php',
            'assets/images/**/*.{png,jpg,gif}',
          ];
  
    browserSync.init(files, {
        proxy: URL,
    });
});        
    
// Compile Sass, Autoprefix and minify
gulp.task('styles', function() {
    return gulp.src('./assets/scss/**/*.scss')
        .pipe(plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
        }))
        .pipe(sourcemaps.init()) // Start Sourcemaps
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('./assets/css/'))
        .pipe(rename({suffix: '.min'}))
        .pipe(cssnano())
        .pipe(sourcemaps.write('.')) // Creates sourcemaps for minified styles
        .pipe(gulp.dest('./assets/css/'))
}); 

// Compile Fontawesome fonts, place in /fonts directory
gulp.task('icons', function() { 
    return gulp.src(config.bowerDir + '/font-awesome/fonts/**.*') 
        .pipe(gulp.dest('./assets/fonts')); 
});

//copy any needed files from /vendor directory
gulp.task('copy', function () {
    gulp.src('./bower_components/what-input/dist/what-input.min.js')
        .pipe(gulp.dest('./assets/js'));
});
    
// JSHint, concat, and minify JavaScript
gulp.task('site-js', function() {
  return gulp.src([	
	  
           // Grab your custom scripts
  		  './assets/js/scripts/*.js'
  		  
  ])
    .pipe(plumber())
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('./assets/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('./assets/js'))
    .pipe(browserSync.stream());
});    

// JSHint, concat, and minify Foundation JavaScript
gulp.task('foundation-js', function() {
  return gulp.src([	
  		  
  		  // Foundation core - needed if you want to use any of the components below
          './bower_components/foundation-sites/js/foundation.core.js',
          './bower_components/foundation-sites/js/foundation.util.*.js',
          
          // Pick the components you need in your project
          //'./bower_components/foundation-sites/js/foundation.abide.js',
          './bower_components/foundation-sites/js/foundation.accordion.js',
          './bower_components/foundation-sites/js/foundation.accordionMenu.js',
          './bower_components/foundation-sites/js/foundation.drilldown.js',
          './bower_components/foundation-sites/js/foundation.dropdown.js',
          './bower_components/foundation-sites/js/foundation.dropdownMenu.js',
          './bower_components/foundation-sites/js/foundation.equalizer.js',
          './bower_components/foundation-sites/js/foundation.interchange.js',
          //'./bower_components/foundation-sites/js/foundation.magellan.js',
          './bower_components/foundation-sites/js/foundation.offcanvas.js',
          './bower_components/foundation-sites/js/foundation.orbit.js',
          './bower_components/foundation-sites/js/foundation.responsiveMenu.js',
          //'./bower_components/foundation-sites/js/foundation.responsiveToggle.js',
          //'./bower_components/foundation-sites/js/foundation.reveal.js',
          //'./bower_components/foundation-sites/js/foundation.slider.js',
          //'./bower_components/foundation-sites/js/foundation.sticky.js',
          './bower_components/foundation-sites/js/foundation.tabs.js',
          //'./bower_components/foundation-sites/js/foundation.toggler.js',
          //'./bower_components/foundation-sites/js/foundation.tooltip.js',
  ])
  .pipe(babel({
    presets: ['es2015'],
      compact: true
  }))
    .pipe(sourcemaps.init())
    .pipe(concat('foundation.js'))
    .pipe(gulp.dest('./assets/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(sourcemaps.write('.')) // Creates sourcemap for minified Foundation JS
    .pipe(gulp.dest('./assets/js'))
});

gulp.task('images', function(cb) {
    gulp.src(['assets/images/**/*.png','assets/images/**/*.jpg','assets/images/**/*.gif','assets/images/**/*.jpeg']).pipe(imageop({
        optimizationLevel: 5,
        progressive: true,
        interlaced: true
    })).pipe(gulp.dest('assets/images')).on('end', cb).on('error', cb);
});

// Create a default task 
gulp.task('default', function() {
  gulp.start('styles', 'site-js', 'foundation-js', 'icons');
});

// Watch files for changes
gulp.task('watch', ['styles', 'browser-sync', 'icons'], function() {

  function logFileChange(event) {
    var fileName = require('path').relative(__dirname, event.path);
    console.log('[' + 'WATCH'.green + '] ' + fileName.magenta + ' was ' + event.type + ', running tasks...');
  }

  // Watch .scss files
  gulp.watch('./assets/scss/**/*.scss', ['styles']) 
    .on('change', function(event) {
      logFileChange(event);
    });

  // Watch site-js files
  gulp.watch('./assets/js/scripts/*.js', ['site-js'])
    .on('change', function(event) {
      logFileChange(event);
    });
  
  // Watch foundation-js files
  gulp.watch('./bower_components/foundation-sites/js/*.js', ['foundation-js']);

});

// PHP Code Sniffer task
gulp.task('phpcs', function() {
  return gulp.src(PATHS.phpcs)
    .pipe(phpcs({
      bin: 'wpcs/bower_components/bin/phpcs',
      standard: './codesniffer.ruleset.xml',
      showSniffCode: true,
    }))
    .pipe($.phpcs.reporter('log'));
});

// PHP Code Beautifier task
gulp.task('phpcbf', function () {
  return gulp.src(PATHS.phpcs)
  .pipe($.phpcbf({
    bin: 'wpcs/bower_components/bin/phpcbf',
    standard: './codesniffer.ruleset.xml',
    warningSeverity: 0
  }))
  .on('error', $.util.log)
  .pipe(gulp.dest('.'));
});
