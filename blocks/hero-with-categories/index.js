import './hero-with-categories.scss';
import $ from 'jquery';

class HeroWithCategories {
	constructor() {
		this.changeTitleClass();
		window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
	}

	changeTitleClass() {
		const titles = $( '.hwc__title' );
		const dates = $( '.hwc__date' );

		titles.removeClass( 'h1-alt' ).removeClass( 'h1' );
		dates.removeClass( 'p' ).removeClass( 'h4' );

		if ( 767 > window.innerWidth ) {
			titles.addClass( 'h1-alt' );
			dates.addClass( 'p' );
		} else {
			titles.addClass( 'h1' );
			dates.addClass( 'h4' );
		}
	}

	delay( callback, ms ) {
		clearTimeout( this.timer );
		this.timer = setTimeout( callback, ms );
	}

	resizeEvent() {
		this.delay(
			() => {
				this.changeTitleClass();
			},
			500
		);
	}
}

new HeroWithCategories();
