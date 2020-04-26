jQuery( document ).ready( function( $ ) {
	var open = $( '#open' ),
		openText = open.find( '.screen-reader-text' ),
		body = $( 'body' )
		

	open.on( 'click', function() {
		body.toggleClass( 'menu-active' )
		if ( 'Open Menu' == openText.html() ) {
			openText.html( 'Close Menu' )
		} else {
			openText.html( 'Open Menu' )
		}
	} )
} )
