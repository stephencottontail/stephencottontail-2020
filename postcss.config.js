var autoprefixer = require( 'autoprefixer' ),
	atImport = require( 'postcss-import' ),
	customProps = require( 'postcss-custom-properties' ),
	hex = require( 'postcss-hexrgba' ),
	nano = require( 'cssnano' )

module.exports = {
	plugins: [
		atImport,
		customProps( {
			preserve: false
		} ),
		autoprefixer,
		hex,
		nano
	]
}
