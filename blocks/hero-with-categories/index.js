import './hero-with-categories.scss';
import $ from 'jquery';

class HeroWithCategories {
	constructor() {
		this.changeTitleClass();
	}

	changeTitleClass() {
		if ( 767 > window.innerWidth ) {
			$( '.hwc__title' ).addClass( 'h1-alt' );
			$( '.hwc__date' ).addClass( 'p' );
		} else {
			$( '.hwc__title' ).addClass( 'h1' );
			$( '.hwc__date' ).addClass( 'h4' );
		}
	}
}

new HeroWithCategories();
