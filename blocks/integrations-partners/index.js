import './integrations-partners.scss';
import $ from 'jquery';

class IntegrationsPartners {
    constructor() {
        this.timer           = 0;
        this.sliderContainer = $( '.integrations__row-content' );

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
            autoplay: true,
            autoplaySpeed: 2000,
            pauseOnFocus: false,
        };

        this.sliderContainer.each( function() {
            if ( 767 > window.innerWidth ) {
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

new IntegrationsPartners();
