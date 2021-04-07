var gulp = require('gulp');
var wpPot = require('gulp-wp-pot');

gulp.task('default', function () {
    return gulp.src('*.php')
        .pipe(wpPot( {
            domain: 'synop-application',
            package: 'synop'
        } ))
        .pipe(gulp.dest('languages/synop-application.pot'));
});