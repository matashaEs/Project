import './highlights.scss';
import $ from 'jquery';

class Highlights {
	constructor() {
		this.timer           = 0;
		this.sliderContainer = $( '.highlights__row-content' );

		this.titleClass();
		this.slider();

		window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
	}

	titleClass() {
		if ( 767 > screen.width ) {
			$( '.highlights__item-title' ).addClass( 'h5' );
		} else {
			$( '.highlights__item-title' ).addClass( 'h4' );
		}
	}

	slider() {
		const innerWidth = window.innerWidth;

		this.sliderContainer.each( function() {
			let slickConf = {
				infinite: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				variableWidth: true,
				dots: true,
				centerMode: true,
			};

			if ( 767 < innerWidth ) {
				slickConf.centerMode = false;
			}
			if ( 1023 < innerWidth ) {
				slickConf.dots = false;
			}

			if ( 1199 < innerWidth && ! $( this ).closest( '.highlights' ).hasClass( 'highlights--small' ) ) {
				slickConf.centerMode = true;
			}

			$( this ).slick( slickConf );
		});
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
				this.titleClass();
			},
			500
		);
	}
}

new Highlights();
