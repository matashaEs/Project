import './options-wide.scss';
import $ from 'jquery';

class OptionsWide {
	sliderContainer = $( '.options-wide__options' );

	constructor() {
		$( window ).on( 'load', function() {
			$( '.options-wide__option-content' ).addClass( 'set-transition' );
			$( '.options-wide__option' ).addClass( 'set-transition' );
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

            let options = $( this ).find( '.options-wide__option' );

			options.click( function() {

				if ( ! $( this ).hasClass( 'options-wide__option--hide-vertical-title' ) ) {
					console.log( 'here' );

					options
						.addClass( 'disable' )
						.addClass( 'options-wide__option--collapse' )
						.removeClass( 'options-wide__option--show-content' )
						.removeClass( 'options-wide__option--hide-vertical-title' );
					$( this )
						.removeClass( 'disable' )
						.removeClass( 'options-wide__option--collapse' )
						.addClass( 'options-wide__option--hide-vertical-title' );

					setTimeout( ()=>{
						$( this )
							.addClass( 'options-wide__option--show-content' );
					}, 750 );

					setTimeout( ()=>{
						options
							.removeClass( 'disable' );
					}, 1500 );
				}
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
