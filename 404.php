<?php
	remove_action( 'genesis_loop', 'genesis_do_loop' );

	add_action( 'genesis_loop', function() {
		$random_value = rand( 0, 2 );
		$fourohfour_moods = array(
			'apologetic',
			'pop-culture',
			'sad'
		);
		$fourohfour_messages = array(
			'Sorry, but that page doesn&apos;t seem to exist. Try a search or click my name up in the top-right to go back to the homepage.',
			'&ldquo;Oh yeah, visitor? Well, the 404 page called; they&apos;re running out of you!&rdquo;',
			'Oh no, it looks like that page went missing. Try a search or click my name up in the top-right to go back to the homepage.',
		);

		ob_start();
		make_jsx_tag_open( 'FourOhFour' );
		make_jsx_attr( 'type', array_values( $fourohfour_moods )[$random_value] );
		make_jsx_tag_close();
		$jsx = ob_get_clean();

		genesis_markup( array(
			'open' => '<header %s>',
			'close' => '</header>',
			'content' => $jsx,
			'context' => 'fourohfour-header'
		) );

		genesis_markup( array(
			'open' => '<div %s>',
			'close' => '</div>',
			'content' => '<p>' . array_values( $fourohfour_messages )[$random_value] . '</p>' . get_search_form( false ),
			'context' => 'fourohfour-content'
		) );
	} );

	genesis();
