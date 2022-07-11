import './benefits.scss';
import $ from 'jquery';

class Benefits {
	constructor() {
		this.timer           = 0;
		this.sliderContainer = $( '.benefits__items-container' );

		this.benefitsTitleClass();
		this.slider();
		window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
	}

	benefitsTitleClass() {
		if ( 767 > screen.width ) {
			$( '.benefits__item-title' ).addClass( 'h5' );
		} else {
			$( '.benefits__item-title' ).addClass( 'h4' );
		}
	}

	slider() {
		if ( 767 > window.innerWidth ) {
			this.sliderContainer.slick(
				{
					infinite: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
					variableWidth: true,
					dots: true,
					centerMode: true,
				}
			);
		}
	}

	delay( callback, ms ) {
		clearTimeout( this.timer );
		this.timer = setTimeout( callback, ms );
	}

	resizeEvent() {
		this.delay(
			() => {
				if ( this.sliderContainer.hasClass( 'slick-initialized' ) ) {
					this.sliderContainer.slick( 'unslick' );
				}
				this.slider();
			},
			500
		);
	}
}

new Benefits();
