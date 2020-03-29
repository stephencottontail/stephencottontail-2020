<?php
	add_action( 'genesis_header', function() {
		echo '<button class="nav-toggle" id="open"><span class="screen-reader-text">Open Menu</span></button>';

		genesis_get_nav_menu( array(
			$theme_location = 'primary'
		) );
	} );
