<?php
	remove_action( 'genesis_entry_header', 'genesis_do_post_format_image', 4 );
	remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
	remove_action( 'genesis_entry_content', 'genesis_do_singular_image', 8 );
	remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
	remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
	remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
	remove_action( 'genesis_after_entry', 'genesis_get_comments_template' );

	add_action( 'genesis_entry_header', function() {
		if ( 'projects' == get_post_type() ) {
			make_jsx_tag_open( 'Project' );
		} else if ( 'themes' == get_post_type() ) {
			make_jsx_tag_open( 'Theme' );
		} else {
			make_jsx_tag_open( 'Article' );
		}

		make_jsx_attr( 'title', sprintf( '<h1 class="entry-title">%s</h1>', esc_attr( get_the_title() ) ) );
		make_jsx_attr( 'date', sprintf( '<time datetime="%s">%s</date>', esc_attr( get_the_date( 'W3C_TIME' ) ), esc_html( get_the_time( get_option( 'date_format' ) ) ) ) );

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
	} );
	add_action( 'genesis_entry_header', 'genesis_do_singular_image', 12 );

	add_filter( 'the_content', function( $content ) {
		if ( 'projects' == get_post_type() ) {
			$embed = wp_oembed_get( get_post_meta( get_the_ID(), 'sc_recent_posts_codepen_url', true ) );

			$content = sprintf( '%s %s %s', $embed, $content );
		}

		$content = sprintf( '%s %s', $content, '<p class="no-comments">Comments are disabled, but you can always reach out to me on <a href="https://twitter.com/s_cottontail24">Twitter</a> instead</p>' );

		return $content;
	}, 2 );

	genesis();
