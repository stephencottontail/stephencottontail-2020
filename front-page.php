<?php
	add_action( 'genesis_before_loop', function() {
		$box = '<svg preserveAspectRatio="none" viewBox="0 0 100 100"><path id="box" d="M 100 0 h -100 v 100 h 100 v -100" /></svg>';
		$hero_title = sprintf( '<h1 class="hero-title">%s</h1>',
								'Hi, I&rsquo;m Steve...'
		);
		$hero_subtitle = sprintf( '<p class="hero-subtitle">%s</p>',
								   '...and I make cool web things.'
		);
		
		printf( '<div class="hero-header">%s%s%s</div>',
						$box,
						$hero_title,
						$hero_subtitle
		);
	} );

	genesis();
