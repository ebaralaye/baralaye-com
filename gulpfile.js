// Include Gulp
var gulp = require('gulp');

// Include Other Plugins
var less = require('gulp-less');

//Compile Our LESS
gulp.task('less', function() {
  return gulp.src('libs/less/main.less')
  .pipe(less())
  .pipe(gulp.dest('libs/css/main.css'));
});

gulp.task('watch', function() {
  gulp.watch('libs/less/*.less', ['less']);
});

// Default Task
gulp.task('default', ['less', 'watch']);
