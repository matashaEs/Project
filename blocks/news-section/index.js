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
		if ( 1023 > window.innerWidth ) {
			this.sliderContainer.slick(
				{
					infinite: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
					variableWidth: true,
					dots: true,
					centerMode: true,
				}
			);
		}
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

new NewsSection();
