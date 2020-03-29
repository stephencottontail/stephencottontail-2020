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

	remove_action( 'genesis_header', 'genesis_do_header' );
	remove_action( 'genesis_after_header', 'genesis_do_nav' );
} );

	add_action( 'wp_enqueue_scripts', function() {
		wp_enqueue_script( 'sc2020-nav', get_stylesheet_directory_uri() . '/js/navigation.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
    wp_enqueue_style( 'sc2020-google-fonts', '//fonts.googleapis.com/css?family=Work+Sans:400,400i,700,700i|Fira+Code:400' );
} );

require_once( 'lib/header.php' );
