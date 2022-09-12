import './hero.scss';

import $ from 'jquery';


class Hero {
    constructor() {
        this.slider();
    }

    slider() {
        $( '.hero__bg-slider' ).slick({
            arrows: false,
            dots: false,
            autoplay: true,
            autoplaySpeed: 5000,
            swipe: false,
        });
    }
}

new Hero();
