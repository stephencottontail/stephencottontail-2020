<?php
	add_action( 'genesis_setup', function() {
		define( 'CHILD_THEME_NAME', 'stephencottontail-2020' );
		define( 'CHILD_THEME_URL', 'https://stephencottontail.com/' );
		define( 'CHILD_THEME_VERSION', '1.0.0' );

		add_theme_support( 'genesis-responsive-viewport' );
		add_theme_support( 'genesis-accessibility', array( 'skip-links', 'headings' ) );
		add_theme_support( 'genesis-footer-widgets', 1 );
		add_theme_support( 'genesis-structural-wraps', array(
			'footer',
			'nav',
			'site-inner'
		) );
		add_theme_support( 'genesis-menus', array(
			'primary' => 'Primary Nav Menu',
			'social' => 'Social Media Menu'
		) );
        
		add_theme_support( 'html5', array( 'caption', 'gallery', 'search-form' ) );

		add_post_type_support( 'post', 'genesis-singular-images' );
		add_post_type_support( 'page', 'genesis-singular-images' );

		unregister_sidebar( 'header-right' );
		unregister_sidebar( 'sidebar' );
		unregister_sidebar( 'sidebar-alt' );

		genesis_unregister_layout( 'content-sidebar' );
		genesis_unregister_layout( 'sidebar-content' );
		genesis_unregister_layout( 'content-sidebar-sidebar' );
		genesis_unregister_layout( 'sidebar-content-sidebar' );
		genesis_unregister_layout( 'sidebar-sidebar-content' );

		remove_theme_support( 'genesis-inpost-layouts' );
		remove_theme_support( 'genesis-archive-layouts' );

		remove_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 5 );

		remove_action( 'genesis_header', 'genesis_do_header' );
		remove_action( 'genesis_after_header', 'genesis_do_nav' );

		remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
		remove_action( 'genesis_footer', 'genesis_do_footer' );
		remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );
	}, 15 );

	add_action( 'wp_enqueue_scripts', function() {
		if ( is_front_page() ) {
			wp_enqueue_script( 'sc2020-hero', get_stylesheet_directory_uri() . '/js/hero.js', array(), null, true );
		}

		wp_enqueue_script( 'sc2020-nav', get_stylesheet_directory_uri() . '/js/navigation.js', array( 'jquery' ) );
		wp_enqueue_style( 'sc2020-google-fonts', '//fonts.googleapis.com/css?family=Work+Sans:400,400i,700,700i|Fira+Code:400,700' );
		wp_enqueue_style( 'sc2020-main-styles', get_stylesheet_directory_uri() . '/style.css', array( 'sc2020-google-fonts', 'wp-block-library' ) );
	} );

	add_action( 'enqueue_block_editor_assets', function() {
		wp_enqueue_style( 'sc-recent-posts-sidebar-style', get_stylesheet_directory_uri() . '/recent-posts-sidebar.css' );
		wp_enqueue_style( 'sc-recent-posts-editor-style', get_stylesheet_directory_uri() . '/recent-posts-editor.css' );
	} );

	add_action( 'enqueue_block_assets', function() {
		wp_enqueue_style( 'sc-recent-posts-style', get_stylesheet_directory_uri() . '/recent-posts-block.css' );
	} );
	
	require_once( 'lib/header.php' );
	require_once( 'lib/footer.php' );

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

	function make_jsx_archive_tag() {
		global $wp_query;

		if ( is_category() ) {
			$type = 'category';
			$value = single_cat_title( '', false );
			if ( get_the_archive_description() ) {
				$extra_attrs['description'] = wp_kses( get_the_archive_description(), array() );
			}
		} else if ( is_tag() ) {
			$type = 'tag';
			$value = single_tag_title( '', false );
			if ( get_the_archive_description() ) {
				$extra_attrs['description'] = wp_kses( get_the_archive_description(), array() );
			}
		} else if ( is_year() ) {
			$type = 'year';
			$value = get_the_date( 'Y' );
		} else if ( is_month() ) {
			$type = 'month';
			$value = get_the_date( 'F Y' );
		} else if ( is_day() ) {
			$type = 'day';
			$value = get_the_date( 'F j, Y' );
		} else if ( is_search() ) {
			$type = 'search';
			$value = get_search_query();
			$extra_attrs['found'] = $wp_query->found_posts ?: 'none';
		}

		if ( get_query_var( 'paged' ) ) {
			$extra_attrs['page'] = get_query_var( 'paged' );
		}

		make_jsx_tag_open( 'Archive' );
		make_jsx_attr( 'type', $type );
		make_jsx_attr( 'value', $value );
		if ( ! empty( $extra_attrs ) && is_array( $extra_attrs ) ) {
			foreach ( $extra_attrs as $key => $value ) {
				make_jsx_attr( $key, $value );
			}
		}
		make_jsx_tag_close();
	}

	add_action( 'wp_footer', function() {
		printf( '<div class="screen-reader-text">%s</div>', file_get_contents( __DIR__ . '/svg/svg.svg' ) );
	}, 99 );
