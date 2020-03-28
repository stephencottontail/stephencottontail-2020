<?php

	remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
	remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title' );

	add_action( 'genesis_before_loop', 'make_jsx_archive_tag', 15 );
		
	genesis();
