import './hero.scss';

import $ from 'jquery';


class Hero {
    constructor() {
        this.slider();
    }

    slider() {
        $( '.hero__bg-slider' ).slick({

            // infinite: false,
            // slidesToShow: 1,
            // slidesToScroll: 1,
            arrows: false,
            dots: false,

            // centerMode: false,
            autoplay: true,
            autoplaySpeed: 5000,
            fade: true,

            // touchMove: false,
            swipe: false,
        });
    }
}

new Hero();
