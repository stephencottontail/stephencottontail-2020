var gulp = require( 'gulp' ),
	postCSS = require( 'gulp-postcss' ),
	autoprefixer = require( 'autoprefixer' ),
	uglify = require( 'gulp-uglify' ),
	svgmin = require( 'gulp-svgmin' ),
	svgstore = require( 'gulp-svgstore' )

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

gulp.task( 'svgs', function() {
	return gulp.src( './src/svg/*.svg' )
		.pipe( svgmin() )
		.pipe( svgstore() )
		.pipe( gulp.dest( './svg' ) )
} )

gulp.task( 'watch', function() {
	gulp.watch( './src/**/*.css', gulp.series( 'styles' ) )
	gulp.watch( './src/**/*.js', gulp.series( 'scripts' ) )
} )
