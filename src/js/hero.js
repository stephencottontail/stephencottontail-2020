( function() {
	var header = document.getElementsByClassName( 'hero-header' )[0];
	var svg = header.getElementsByTagName( 'svg' )[0];
	var scrollArea = header.offsetHeight;
	var strokeGap = 500;
	var strokeDash = 0;

	window.addEventListener( 'scroll', function() {
		var percentage = window.scrollY / scrollArea;
		var delta = strokeGap * percentage;

		svg.setAttribute( 'style', 'stroke-dasharray: ' + ( strokeGap - delta ) + ' ' + ( strokeDash + delta ) );
	} );
} )()
