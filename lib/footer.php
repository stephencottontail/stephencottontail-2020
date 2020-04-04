<?php

	add_action( 'genesis_before_footer', 'genesis_footer_markup_open', 5 );

	add_action( 'genesis_before_footer', function() {
		genesis_markup( array(
			'open'    => '<div %s>',
			'context' => 'home-link'
		) );

		printf( '<a class="footer-logo-home-link" href="%s"><svg class="footer-logo"><use href="#logo"></use></svg></a>', esc_url( home_url( '/' ) ) );

		genesis_markup( array(
			'close'   => '</div>',
			'context' => 'home-link'
		) );
	}, 6 );

	add_action( 'genesis_after_footer', function() {
		genesis_markup( array(
			'open'    => '<div %s>',
			'context' => 'copyright'
		) );

		// footer text

		genesis_markup( array(
			'close'   => '</div>',
			'context' => 'copyright'
		) );
	} );

	add_action( 'genesis_after_footer', 'genesis_footer_markup_close', 15 );
