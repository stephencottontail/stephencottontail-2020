var autoprefixer = require( 'autoprefixer' ),
	atImport = require( 'postcss-import' ),
	customProps = require( 'postcss-custom-properties' ),
	nano = require( 'cssnano' ),
	ease = require( 'postcss-easing-gradients' );

module.exports = {
	plugins: [
		atImport,
		customProps( {
			preserve: false
		} ),
		autoprefixer,
		ease,
		nano
	]
}
