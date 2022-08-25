import './browse-scroll.scss';
import $ from 'jquery';

class BrowseScroll {
	sliderContainer = $( '.browse-scroll__items-list' );
	cachedWidth = $( window ).width();

	constructor() {
		this.sliderContainer.on( 'afterChange', function( e, slick, current ) {
			if ( $( this ).closest( '.browse-scroll' ).hasClass( 'browse-scroll--reverse' ) && 767 < window.innerWidth && current === slick.$slides.length - 1 && 0 === slick.getOption( 'speed' ) ) {
				$( '.browse-scroll__items-list' ).each( function() {
					$( this ).slick( 'slickSetOption', 'speed', 300, true );
					$( this ).slick( 'slickSetOption', 'autoplaySpeed', 2000, true );
					$( this ).slick( 'slickSetOption', 'autoplay', true, true );
				});
			}
		});

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

				if ( 1199 < windowWidth ) {
					paddingLeft  = 70;
					paddingRight = ( windowWidth / 2 ) - itemWidth - paddingLeft;
				} else if ( 767 < windowWidth ) {
					paddingLeft  = 50;
					paddingRight = ( windowWidth / 2 ) - itemWidth - paddingLeft;
				}

				let slickConf = {
					infinite: false,
					arrows: false,
					dots: true,
					mobileFirst: true,
					centerMode: true,
					variableWidth: true,
					autoplay: true,
					autoplaySpeed: 4000,
					pauseOnHover: false,
					centerPadding: paddingRight + 'px 0px ' + paddingLeft + 'px',
				};

				if ( 767 < windowWidth ) {
					slickConf.autoplay = false;

					if ( $( this ).closest( '.browse-scroll' ).hasClass( 'browse-scroll--reverse' ) ) {
						slickConf.autoplay = true;
						slickConf.speed = 0;
						slickConf.autoplaySpeed = 0;
						slickConf.centerPadding = paddingLeft + 'px 0px ' + paddingRight + 'px';
					}
				}

				$( this ).slick( slickConf );
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
