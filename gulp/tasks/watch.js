var gulp = require('gulp');
var config = require('../config');
var browserSync = require('browser-sync').create();

module.exports = function() {
  browserSync.init({
    proxy: config.domain
  });
  gulp.watch(config.sass.src,['sass']).on('change', browserSync.reload);
  gulp.watch(config.scripts.src,['scripts']).on('change', browserSync.reload);
};
