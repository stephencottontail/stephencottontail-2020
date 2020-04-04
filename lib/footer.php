<?php

	add_action( 'genesis_before_footer', function() {
		genesis_markup( array(
			'open' => '<div %s>',
			'context' => 'footer-wrap'
		) );
		genesis_structural_wrap( 'footer-wrap', 'open' );
	}, 5 );

	add_action( 'genesis_before_footer', function() {
		printf( '<a class="footer-logo-home-link" href="%s"><svg class="footer-logo"><use href="#logo"></use></svg></a>', esc_url( home_url( '/' ) ) );
	}, 6 );

	add_action( 'genesis_after_footer', function() {
		genesis_markup( array(
			'close' => '</div>',
			'context' => 'footer-wrap'
		) );
		genesis_structural_wrap( 'footer-wrap', 'close' );
 	}, 15 );
