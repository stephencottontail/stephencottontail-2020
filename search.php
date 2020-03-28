<?php

	remove_action( 'genesis_before_loop', 'genesis_do_search_title' );

	add_action( 'genesis_before_loop', 'make_jsx_archive_tag' );

	genesis();
