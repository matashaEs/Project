import './browse-scroll.scss';
import $ from 'jquery';

class BrowseScroll {
	constructor() {
		this.sliderContainer = $( '.browse-scroll__items-list' );

		this.slider();
		window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
	}

	slider() {
		const windowWidth = window.innerWidth;

		let slickConf = {
			infinite: false,
			arrows: false,
			dots: true,
			mobileFirst: true,
			centerMode: true,
			variableWidth: true,

			responsive: [ {
				breakpoint: 767,
				settings: {
					dots: false,
				}
			} ]
		};

		const itemWidth  = this.sliderContainer.find( '.browse-scroll__item-bg' ).first().innerWidth();
		let paddingLeft  = 20;
		let paddingRight = windowWidth - itemWidth - paddingLeft;

		if ( 1199 < windowWidth ) {
			paddingLeft  = 70;
			paddingRight = ( windowWidth / 2 ) - itemWidth - paddingLeft;
		} else if ( 767 < windowWidth ) {
			paddingLeft  = 50;
			paddingRight = ( windowWidth / 2 ) - itemWidth - paddingLeft;
		}

		slickConf.centerPadding = paddingRight + 'px 0px ' + paddingLeft + 'px';

		this.sliderContainer.slick( slickConf );
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

new BrowseScroll();
