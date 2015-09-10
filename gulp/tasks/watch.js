var gulp = require('gulp');
var config = require('../config');

module.exports = function() {
  gulp.watch(config.sass.src,['sass']);
  gulp.watch(config.scripts.src,['scripts']);
};
