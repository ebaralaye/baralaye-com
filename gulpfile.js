// Include Gulp
var gulp = require('gulp');

// Include Other Plugins
//var less = require('gulp-less');
var less =require('gulp-less-sourcemap');
var path =require('path');

//Compile Our LESS
gulp.task('less', function() {
  return gulp.src('www/libs/less/main.less')
  .pipe(less({
    generateSourceMap:true,
    paths:[ path.join('www/libs/less','less','includes')]
  }))
  .pipe(gulp.dest('www/libs/css'));
});

gulp.task('watch', function() {
  gulp.watch('www/libs/less/*.less', ['less']);
});

// Default Task
gulp.task('default', ['less', 'watch']);
