import './careers-scroll.scss';
import $ from 'jquery';

class CareersScroll {
	constructor() {
		this.timer           = 0;
		this.sliderContainer = $( '.careers-scroll__row-content' );

		this.titlesClass();
		this.slider();

		window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
	}

	titlesClass() {
		const itemsTitles =  $( '.careers-scroll__item-title' );
		const itemsDescription =  $( '.careers-scroll__item-description' );

		itemsTitles.removeClass( 'h3' ).removeClass( 'h5' );
		itemsDescription.removeClass( 'p' ).removeClass( 'p-large' );

		if ( 1024 > screen.width ) {
			itemsTitles.addClass( 'h5' );
			itemsDescription.addClass( 'p' );
		} else {
			itemsTitles.addClass( 'h3' );
			itemsDescription.addClass( 'p-large' );
		}
	}

	slider() {
		this.sliderContainer.each( function() {
			const items = $( this ).find( '.careers-scroll__item' );
			items.css( 'height', '' );

			/**
			 * horizontal scrolling configuration
			 */
			let slickConf = {
				infinite: false,
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				variableWidth: true,
				dots: true,
				centerMode: true,
			};

			if ( 767 < window.innerWidth ) {
				slickConf.centerMode = false;
			}

			/**
			 * vertical scrolling additional configuration
			 */
			if ( 1023 < window.innerWidth ) {
				slickConf.vertical = true;
				slickConf.verticalSwiping = true;
				slickConf.variableWidth = false;
			}

			/**
			 * set elements height to max element's height in vertical scroll
			 */
			if ( 1024 < window.innerWidth ) {
				let maxHeight = Math.max.apply( null, items.map( function() {
					return $( this ).height();
				}).get() );

				items.height( maxHeight );
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
				this.titlesClass();
			},
			500
		);
	}
}

new CareersScroll();
