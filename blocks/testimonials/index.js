import './testimonials.scss';
import $ from 'jquery';

class Testimonials {
	constructor() {
		this.timer           = 0;
		this.sliderContainer = $( '.testimonials__row-content' );

		this.onScreenWidthChange();

		window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
	}

	itemsClassChanger( elements, mobileClass, desktopClass, width = 1199 ) {
		elements.removeClass( mobileClass );
		elements.removeClass( desktopClass );

		if ( width > screen.width ) {
			elements.addClass( mobileClass );
		} else {
			elements.addClass( desktopClass );
		}
	}

	slider() {
		this.sliderContainer.each( function() {
			let slickConf = {
				infinite: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				variableWidth: true,
				dots: true,
				centerMode: true,
				autoplay: true,
				autoplaySpeed: 2000,
			};

			if ( 767 < window.innerWidth ) {
				slickConf.infinite = false;
				slickConf.centerMode = false;
				slickConf.dots = false;
			}

			if ( 2399 < innerWidth ) {
				slickConf.slidesToShow = 2;
			}

			if ( slickConf.slidesToShow < $( this ).find( '.testimonials__client' ).length ) {
				$( this ).slick( slickConf );
			}

			/**
			 * enables trackpad scroll
			 */
			let blocked = false;
			let blockTimeout = null;
			let prevDeltaX = 0;

			$( this ).on( 'mousewheel DOMMouseScroll wheel', ( function( e ) {
				let deltaX = e.originalEvent.deltaX;
				let deltaY = e.originalEvent.deltaY;

				if ( 'undefined' != typeof deltaY ) {
					clearTimeout( blockTimeout );
					blockTimeout = setTimeout( function() {
						blocked = false;
					}, 50 );

					if ( ( 1 > deltaY && -1 < deltaY ) && ( ( 10 < deltaX && deltaX > prevDeltaX ) || ( -10 > deltaX && deltaX < prevDeltaX ) || ! blocked ) ) {
						e.preventDefault();
						e.stopPropagation();

						blocked = true;
						prevDeltaX = deltaX;

						if ( 0 < deltaX ) {
							$( this ).slick( 'slickNext' );
						} else {
							$( this ).slick( 'slickPrev' );
						}
					}
				}
			}) );
		});
	}

	onScreenWidthChange() {
		this.itemsClassChanger( $( '.testimonials__client-name' ), 'h4', 'h3' );
		this.itemsClassChanger( $( '.testimonials__client-opinion' ), 'p', 'p-large' );

		this.slider();
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

				this.onScreenWidthChange();
			},
			500
		);
	}
}

new Testimonials();
