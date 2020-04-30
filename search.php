<?php

	remove_action( 'genesis_before_loop', 'genesis_do_search_title' );

	remove_action( 'genesis_entry_header', 'genesis_do_post_format_image', 4 );
	remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
	remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
	remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
	remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
	remove_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );
	remove_action( 'genesis_entry_content', 'genesis_do_post_permalink', 14 );
	remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
	remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
	remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
	remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );
	remove_action( 'genesis_after_entry', 'genesis_adjacent_entry_nav' );
	remove_action( 'genesis_after_entry', 'genesis_get_comments_template' );

	remove_action( 'genesis_loop_else', 'genesis_do_noposts' );

	add_action( 'genesis_before_loop', 'make_jsx_archive_tag' );
	add_action( 'genesis_before_loop', function() {
		genesis_markup( array(
			'open'    => '<div %s>',
			'context' => 'archive-entries'
		) );
	}, 20 );
	add_action( 'genesis_after_endwhile', function() {
		genesis_markup( array(
			'close'   => '</div>',
			'context' => 'archive-entries'
		) );
	}, 5 );

	add_action( 'genesis_loop_else', function() {
		genesis_markup( array(
			'open' => '<div %s>',
			'close' => '</div>',
			'content' => '<p>No posts met your criteria. Try another search or click my name in the top-right to go back to the homepage.</p>' . get_search_form( false ),
			'context' => 'no-search-results'
		) );
	} );
	
	add_filter( 'post_class', function( $classes ) {
		$classes[] = 'archive-entry';

		return $classes;
	} );

	add_filter( 'genesis_post_info', function() {
		return sprintf( '<time datetime="%s">%s</time>',
						esc_attr( get_the_time( DATE_W3C ) ),
						esc_html( get_the_date() )
		);
	} );

	genesis();
