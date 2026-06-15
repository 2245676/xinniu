( function () {
	const toggle = document.querySelector( '.site-navigation-toggle' );
	const navigation = document.querySelector( '.site-navigation' );

	if ( ! toggle || ! navigation ) {
		return;
	}

	toggle.addEventListener( 'click', function () {
		const isOpen = navigation.classList.toggle( 'is-open' );
		toggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
	} );
}() );

