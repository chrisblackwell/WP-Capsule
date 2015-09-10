var gulp = require('./gulp')([
  'sass',
  'scripts',
  'watch'
]);

gulp.task('default', ['sass', 'scripts', 'watch']);
