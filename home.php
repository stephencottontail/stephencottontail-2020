<?php

	remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );

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

	add_action( 'genesis_before_loop', function() {
		make_jsx_tag_open( 'Blog' );

		if ( get_query_var( 'paged' ) ) {
			make_jsx_attr( 'page', get_query_var( 'paged' ) );
		} else {
			make_jsx_attr( 'page', '1' );
		}

		make_jsx_tag_close();
	} );

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
