import './slider.scss';
import $ from 'jquery';

class Slider {
	constructor() {
		this.timer           = 0;
		this.sliderContainer = $( '.slider__container' );

		this.slider();
		window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
	}

	slider() {
		let slickConfig = {
			infinite: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			variableWidth: true,
			dots: true,
			autoplay: true,
			autoplaySpeed: 2000,
			pauseOnFocus: false,
		};

		this.sliderContainer.each( function() {
			$( this ).slick( slickConfig );
		});
	}

	delay( callback, ms ) {
		clearTimeout( this.timer );
		this.timer = setTimeout( callback, ms );
	}

	resizeEvent() {
		this.delay(
			() => {
				this.sliderContainer.each( function() {
					if ( $( this ).hasClass( 'slick-initialized' ) ) {
						$( this ).slick( 'unslick' );
					}
				});
				this.slider();
			},
			500
		);
	}
}

new Slider();
