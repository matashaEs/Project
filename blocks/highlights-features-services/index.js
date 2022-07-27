import './highlights-features-services.scss';
import $ from 'jquery';

class HighlightsFeaturesServices {
	sections = $( '.highlights' );

	constructor() {
		this.timer           = 0;
		this.sliderContainer = $( '.highlights__row-content' );

		this.titleClass();
		this.slider();

		window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
	}

	titleClass() {
		this.sections.each( function() {
			const title =  $( this ).find( '.highlights__title' );
			const itemsTitles =  $( this ).find( '.highlights__item-title' );

			title.removeClass( 'h2' ).removeClass( 'h3' );
			itemsTitles.removeClass( 'h3' ).removeClass( 'h4' ).removeClass( 'h5' );

			if ( 767 > screen.width ) {
				title.addClass( 'h5' );
				itemsTitles.addClass( 'h5' );
			} else {
				if ( 0 !== $( this ).closest( '.sidebar-and-content__content-container' ).length ) {
					title.addClass( 'h2' );
					itemsTitles.addClass( 'h3' );
				} else {
					title.addClass( 'h3' );
					itemsTitles.addClass( 'h4' );
				}
			}
		});
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
				slickConf.infinite = false;
				slickConf.dots = false;
			}

			if ( 1023 < innerWidth && 0 === $( this ).closest( '.sidebar-and-content__content-container' ).length ) {
				if ( 1199 > innerWidth ) {
					slickConf.slidesToShow = 2;
				} else {
					slickConf.slidesToShow = 3;
				}

				if ( 3 <= $( this ).find( '.highlights__item' ).length ) {
					$( this ).slick( slickConf );
				}
			} else {
				$( this ).slick( slickConf );
			}
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

new HighlightsFeaturesServices();
