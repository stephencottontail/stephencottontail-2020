var gulp = require( 'gulp' ),
	postCSS = require( 'gulp-postcss' ),
	autoprefixer = require( 'autoprefixer' ),
	uglify = require( 'gulp-uglify' )

gulp.task( 'styles', function() {
	return gulp.src( [ './src/css/recent-posts-sidebar.css', './src/css/recent-posts-editor.css', './src/css/recent-posts-block.css', './src/css/style.css' ] )
		.pipe( postCSS() )
		.pipe( gulp.dest( '.' ) )
} )

gulp.task( 'scripts', function() {
	return gulp.src( './src/js/*.js' )
		.pipe( uglify() )
		.pipe( gulp.dest( './js' ) )
} )

gulp.task( 'watch', function() {
	gulp.watch( './src/**/*.css', gulp.series( 'styles' ) )
	gulp.watch( './src/**/*.js', gulp.series( 'scripts' ) )
} )
