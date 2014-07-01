// Include Gulp
var gulp = require('gulp');

// Include Other Plugins
var less = require('gulp-less-sourcemap');
var path = require('path');

//Compile LESS
gulp.task('less', function() {
  return gulp.src('www/libs/less/index.less')
  .pipe(less({
    generateSourceMap:true,
    paths:[ path.join('__dirname','less','includes')]
  }))
  .pipe(gulp.dest('www/libs/css'));
});

// Watch Task
gulp.task('watch', function() {
  gulp.watch('www/libs/less/*.less', ['less']);
});

// Default Task
gulp.task('default', ['less', 'watch']);
