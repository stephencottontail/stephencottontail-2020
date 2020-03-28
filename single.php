<?php
	remove_action( 'genesis_entry_header', 'genesis_do_post_format_image', 4 );
	remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
	
	add_action( 'genesis_entry_content', function() {
		make_jsx_tag_open( 'Article' );
		make_jsx_attr( 'date', sprintf( '<time datetime="%s">%s</date>', esc_attr( get_the_date( 'W3C_TIME' ) ), esc_html( get_the_time( get_option( 'date_format' ) ) ) ) );
		make_jsx_attr( 'author', sprintf( '<a href="%s">%s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) );

		if ( has_category() ) {
			if ( 1 < count( get_the_category() ) ) {
				make_jsx_attr_multi( 'cats', get_the_category_list( ', ' ) );
			} else {
				make_jsx_attr( 'cats', get_the_category_list( ', ' ) );
			}
		}

		if ( has_tag() ) {
			if ( 1 < count( get_the_tags() ) ) {
				make_jsx_attr_multi( 'tags', get_the_tag_list( '', ', ', '' ) );
			} else {
				make_jsx_attr( 'tags', get_the_tag_list( '', ', ', '' ) );
			}
		}

		make_jsx_tag_close();
	}, 4 );

	genesis();
