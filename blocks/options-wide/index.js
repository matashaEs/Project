import './options-wide.scss';
import $ from 'jquery';

class OptionsWide {
	sliderContainer = $( '.options-wide__options' );

	constructor() {
		this.slider();
		window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
	}

	slider() {
		const windowWidth = window.innerWidth;

		this.sliderContainer.each(
			function() {
				let paddingLeft, paddingRight;

				const itemWidth = $( this ).find( '.options-wide__option' ).first().innerWidth();
				paddingLeft     = 20;
				paddingRight    = windowWidth - itemWidth - paddingLeft;

				let slickConf = {
					infinite: false,
					arrows: false,
					dots: true,
					mobileFirst: true,
					centerMode: true,
					variableWidth: true,
					autoplay: true,
					autoplaySpeed: 2000,
					pauseOnFocus: false,
					centerPadding: paddingRight + 'px 0px ' + paddingLeft + 'px',
				};

				if ( 1024 > windowWidth ) {
					$( this ).slick( slickConf );
				}
			}
		);
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

new OptionsWide();
