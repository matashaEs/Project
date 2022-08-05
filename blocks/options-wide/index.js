import './options-wide.scss';
import $ from 'jquery';

class OptionsWide {
	sliderContainer = $( '.options-wide__options' );

	constructor() {
		$( window ).on( 'load', function() {
			$( '.options-wide__option-content' ).addClass( 'set-transition' );
			$( '.options-wide__option--desktop' ).addClass( 'set-transition' );
		});

		this.slider();
		this.collapseOptions();
		window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
	}

	slider() {
		const windowWidth = window.innerWidth;

		this.sliderContainer.each(
			function() {
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
				};

				if ( 768 > windowWidth ) {
					const itemWidth = $( this ).find( '.options-wide__option' ).first().innerWidth();
					const paddingLeft = 20;
					const paddingRight = windowWidth - itemWidth - paddingLeft;
					slickConf.centerPadding = paddingRight + 'px 0px ' + paddingLeft + 'px';
				} else {
					slickConf.centerMode = false;
					slickConf.slidesToShow = 2;
				}

				if ( 1024 > windowWidth ) {
					$( this ).slick( slickConf );
				}
			}
		);
	}

	collapseOptions() {
		this.sliderContainer.each( function() {

            let options = $( this ).find( '.options-wide__option--desktop' );

			options.click( function() {

				options
					.addClass( 'options-wide__option--collapse' )
					.removeClass( 'options-wide__option--show-content' );
				$( this )
					.removeClass( 'options-wide__option--collapse' )
					.addClass( 'options-wide__option--show-content' );
			});
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
			},
			500
		);
	}
}

new OptionsWide();
