import './news-section.scss';
import $ from 'jquery';

class NewsSection {
	constructor() {
		this.timer           = 0;
		this.sliderContainer = $( '.news-section__row-news' );

		this.slider();
		window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
	}

	slider() {
		let slickConfig = {
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			variableWidth: true,
			dots: true,
			centerMode: true,
		};

		this.sliderContainer.each( function() {
			if ( 767 > window.innerWidth ) {
				$( this ).slick( slickConfig );
			} else if ( 1023 > window.innerWidth && 2 < $( this ).children( '.news-section__item' ).length ) {
				slickConfig.centerMode = false;
				$( this ).slick( slickConfig );
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

new NewsSection();
