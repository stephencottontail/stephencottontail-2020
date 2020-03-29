<?php
	add_action( 'genesis_header', function() {
		do_action( 'genesis_site_title' );

		echo '<button class="nav-toggle" id="open"><span class="screen-reader-text">Open Menu</span></button>';
	} );

	add_action( 'genesis_after_header', function() {
		echo '<div class="nav-panel">';

		// oops, i forgot to merge in the JSX tags branch
		genesis_nav_menu( array(
			'theme_location' => 'primary'
		) );

		genesis_nav_menu( array(
			'theme_location' => 'social'
		) );

		echo '</div><!-- .nav-panel -->';
	} );
