import './browse-scroll.scss';
import $ from 'jquery';

class BrowseScroll {
	sliderContainer = $( '.browse-scroll__items-list' );
	cachedWidth = $( window ).width();

	constructor() {
		this.slider();
		window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
	}

	slider() {
		const windowWidth = window.innerWidth;

		this.sliderContainer.each(
			function() {
				let paddingLeft, paddingRight;

				const itemWidth = $( this ).find( '.browse-scroll__item-bg' ).first().innerWidth();
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

				if ( 768 > windowWidth ) {
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
		const newWidth = $( window ).width();
		if ( newWidth !== this.cachedWidth ) {
			this.delay(
				() => {
					if ( this.sliderContainer.hasClass( 'slick-initialized' ) ) {
						this.sliderContainer.slick( 'unslick' );
					}
					this.slider();
				},
				500
			);

			this.cachedWidth = newWidth;
		}
	}
}

new BrowseScroll();
