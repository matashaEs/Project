import './hero.scss';
import $ from 'jquery';

class Hero {
	constructor() {
		this.benefitsTitleClass();
	}

	benefitsTitleClass() {
		if ( 767 > screen.width ) {
			$( '.hero__title' ).addClass( 'h1-alt' );
			$( '.hero__button-link' ).addClass( 'p' );
		} else {
			$( '.hero__title' ).addClass( 'h1' );
			$( '.hero__button-link' ).addClass( 'h5' );
		}
	}

}

new Hero();
