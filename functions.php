<?php

	add_action( 'genesis_setup', function() {
		define( 'CHILD_THEME_NAME', 'stephencottontail-2020' );
		define( 'CHILD_THEME_URL', 'https://stephencottontail.com/' );
		define( 'CHILD_THEME_VERSION', '1.0.0' );

		add_theme_support( 'genesis-responsive-viewport' );
		add_theme_support( 'genesis-accessibility', array( 'skip-links', 'headings' ) );
		add_theme_support( 'genesis-footer-widgets', 2 );
		add_theme_support( 'genesis-structural-wraps', array(
			'footer',
			'footer-widgets',
			'header',
			'nav',
			'site-inner'
		) );
		add_theme_support( 'genesis-menus', array(
			'primary' => 'Primary Nav Menu',
			'social' => 'Social Media Menu'
		) );
        
		add_theme_support( 'html5', array( 'caption', 'gallery', 'search-form' ) );

		unregister_sidebar( 'header-right' );
		unregister_sidebar( 'sidebar' );
		unregister_sidebar( 'sidebar-alt' );

		genesis_unregister_layout( 'content-sidebar' );
		genesis_unregister_layout( 'sidebar-content' );
		genesis_unregister_layout( 'content-sidebar-sidebar' );
		genesis_unregister_layout( 'sidebar-content-sidebar' );
		genesis_unregister_layout( 'sidebar-sidebar-content' );
	} );

	add_action( 'wp_enqueue_scripts', function() {
		wp_enqueue_style( 'sc2020-google-fonts', '//fonts.googleapis.com/css?family=Work+Sans|Fira+Code:400' );
	} );

	function make_jsx_tag_open( $tag_name ) {
		echo sprintf( '<code class="jsx">&lt;<span class="jsx-tag">%s</span><br />', $tag_name );
	}

	function make_jsx_attr( $attr_name, $attr_value ) {
		echo sprintf( '&nbsp;&nbsp;<span class="jsx-attr">%s</span>="<span class="jsx-attr-string">%s</span>"<br />', $attr_name, $attr_value );
	}

	function make_jsx_attr_multi( $attr_name, $attr_value ) {
		echo sprintf( '&nbsp;&nbsp;<span class="jsx-attr">%s</span>={["<span class="jsx-attr-string">%s</span>"]}<br />', $attr_name, $attr_value );
	}
			
	function make_jsx_tag_close() {
		echo '&gt;</code>';
	}
