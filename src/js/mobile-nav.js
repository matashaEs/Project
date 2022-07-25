import $ from 'jquery';

class Navigation {
    constructor() {
        this.body = $( 'body' );
        $( '.menu-item-has-children > a' ).click( function( e ) {
            e.preventDefault();
            if ( 1023 > $( window ).width() ) {
                $( this ).next( '.sub-menu' ).slideToggle();
                $( '.menu-item-has-children' ).toggleClass( 'nav__mobile-menu-item--chosen' );
            }
        });

        $( '.nav__open' ).on( 'click', this.toggleMenu );
        $( '.nav__close' ).on( 'click', this.toggleMenu );
        $( '.nav__close' ).on( 'click', this.addScrolling );
        $( '.nav__main-menu--open' ).on( 'click', this.toggleMenu );
    }

    addScrolling = () => {
        window.onscroll = '';
    }

    toggleMenu = () => {
        var xPos = window.scrollX;
        var yPos = window.scrollY;
        window.onscroll = () => {
            window.scroll(xPos, yPos);
        };

        $( '.nav__open' ).toggleClass( 'nav__mobile--visible' );
        $( '.nav__mobile-menu' ).toggleClass( 'nav__mobile-menu--visible' );
        $( '.nav__desktop--extended' ).toggleClass( 'nav--visible' );
        $( '.nav-container' ).toggleClass( 'nav-container--visible' );
    }
}

new Navigation();
