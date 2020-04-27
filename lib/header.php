<?php
	add_action( 'genesis_header', function() {
		do_action( 'genesis_site_title' );

		echo '<button class="nav-toggle" id="open"><span class="screen-reader-text">Open Menu</span></button>';
	} );

	add_action( 'genesis_after_header', function() {
		echo '<div class="nav-panel">';

		genesis_nav_menu( array(
			'theme_location' => 'primary'
		) );
		genesis_nav_menu( array(
			'theme_location' => 'social'
		) );

		echo '</div><!-- .nav-panel -->';
	} );

	function add_nav_jsx( $nav_output, $nav, $args ) {
		ob_start();
		make_jsx_tag_open( 'Nav' );
		if ( 'social' == $args['theme_location'] ) {
			make_jsx_attr( 'type', 'social' );
		} else {
			make_jsx_attr( 'type', 'primary' );
		}
		make_jsx_tag_close();
		
		$jsx = ob_get_clean();

		/**
		 * This assumes the first `>` in `$nav_output` will be in `<nav>`,
		 * so let's hope Genesis doesn't change up the nav menu output
		 */
		return preg_replace( '/>/', '>' . $jsx, $nav_output, 1 );
	}

	add_filter( 'genesis_do_nav', 'add_nav_jsx', 10, 3 );
	add_filter( 'genesis_social_nav', 'add_nav_jsx', 10, 3 );
