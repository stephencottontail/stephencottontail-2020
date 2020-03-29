jQuery( document ).ready( function( $ ) {
	var open = $( '#open' ),
		close = $( '#close' ),
		body = $( 'body' )

	open.on( 'click', function() {
		body.toggleClass( 'menu-active' )
	} )
} )
