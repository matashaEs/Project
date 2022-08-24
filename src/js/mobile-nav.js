import $ from 'jquery';

class Navigation {
	constructor() {
		this.body = $( 'body' );
		$( '.menu-item-has-children > a' ).click(
			function( e ) {
				e.preventDefault();
				if ( 1023 > $( window ).width() ) {
                      $( this ).next( '.sub-menu' ).slideToggle();
                      $( '.menu-item-has-children' ).toggleClass( 'nav__mobile-menu-item--chosen' );
					$( '.nav__content' ).animate({scrollTop: $( '.nav__content' ).height()}, 1000 );
				}
			}
		);

		$( '.nav__open-icon' ).on( 'click', this.toggleMenu );
		$( '.nav__close' ).on( 'click', this.toggleMenu );
		$( '.nav__main-menu--open' ).on( 'click', this.toggleMenu );
	}

	toggleMenu             = () => {
		const scrollY      = document.body.style.top;
		$( '.nav__mobile-menu' ).toggleClass( 'nav__mobile-menu--visible' );
		$( '.nav__desktop--extended' ).toggleClass( 'nav--visible' );
		$( '.nav-container' ).toggleClass( 'nav-container--visible' );
		$( 'body' ).children().not( 'script, svg, link, header' ).toggleClass( 'disable' );
		const windowScroll = window.scrollY;
		if ( $( '.nav__mobile-menu' ).hasClass( 'nav__mobile-menu--visible' ) ) {
			document.body.style.position = 'fixed';
			document.body.style.top      = `-${windowScroll}px`;
			$( '.nav__fluid' ).css( 'margin-top', `${windowScroll}px` );
			const windowHeight = $( window ).innerHeight() ;
			const contentHeight = windowHeight - 70;
			$( '.nav__content' ).css( 'max-height', `${contentHeight}px` );
		} else {
			document.body.style.position = '';
			document.body.style.top      = '';
			window.scrollTo( 0, parseInt( scrollY || '0' ) * -1 );
			$( '.nav__fluid' ).css( 'margin-top', '0' );
		}
	}
}


new Navigation();
