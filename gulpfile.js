var gulp = require( 'gulp' ),
	postCSS = require( 'gulp-postcss' ),
	autoprefixer = require( 'autoprefixer' )

gulp.task( 'styles', function() {
	return gulp.src( './src/style.css' )
		.pipe( postCSS() )
		.pipe( gulp.dest( '.' ) )
} )
			   
gulp.task( 'watch', function() {
	gulp.watch( './src/**/*.css', gulp.series( 'styles' ) )
} )
