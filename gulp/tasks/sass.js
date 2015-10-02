var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var notify = require('gulp-notify');
var config = require('../config');

module.exports = function() {
  gulp.src(config.sass.src)
    .pipe(sass({
      outputStyle: 'compact'
    }).on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe(gulp.dest('./assets/css'))
    .pipe(notify({
      title: config.notify.title,
      message: 'SASS Compiled :-)',
      icon: config.notify.icon_success,
      onLast: true
    }));
};
