import './hero-with-description.scss';
import $ from 'jquery';

class HeroWithDesrciption {
	constructor() {
		this.changeTitleClass();
	}

	changeTitleClass() {
		if ( 767 > screen.width ) {
			$( '.hwd__title' ).addClass( 'h1-alt' );
			$( '.hwd__description' ).addClass( 'p' );
		} else {
			$( '.hwd__title' ).addClass( 'h1' );
			$( '.hwd__description' ).addClass( 'h6' );
		}
	}
}

new HeroWithDesrciption();
