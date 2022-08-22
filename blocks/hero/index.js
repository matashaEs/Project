import './hero.scss';

import $ from 'jquery';

class Hero {
    constructor() {
        this.changeTitleClassHero();
        window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
    }

    changeTitleClassHero() {
        const subtitle = $( '.hero__subtitle' );
        if ( 1024 > window.innerWidth ) {
            subtitle.addClass( 'h1-alt' );
        } else {
            subtitle.addClass( 'h2' );
        }
    }

    delay( callback, ms ) {
        clearTimeout( this.timer );
        this.timer = setTimeout( callback, ms );
    }

    resizeEvent() {
        this.delay(
            () => {
                this.changeTitleClass();
            },
            500
        );
    }
}

new Hero();
