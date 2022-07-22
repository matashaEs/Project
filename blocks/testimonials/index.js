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
			};

			$( this ).slick( slickConf );
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
