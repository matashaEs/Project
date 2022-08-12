import './recent-product-project.scss';

import $ from 'jquery';


class RecentProductProject {
    constructor() {
        this.slider();
    }

    slider() {
        $( '.recent-product-project__slider' ).slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,

            // variableWidth: true,
            dots: true,
            centerMode: false,
            autoplay: false,
            autoplaySpeed: 2000,
            pauseOnFocus: false,
        });
    }
}

new RecentProductProject();
