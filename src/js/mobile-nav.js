import $ from 'jquery';

class Navigation {
    constructor() {
        this.body = $( 'body' );
        if ( 1023 > $( window ).width() ) {
            $( '.menu-item-has-children > a' ).click( function( e ) {
                e.preventDefault();
                $( this ).next( '.sub-menu' ).slideToggle();
                $( '.menu-item-has-children' ).toggleClass( 'nav__mobile-menu-item--chosen' );
            });
        } else {
            $( '.menu-item-has-children > a' ).click( function( e ) {
                e.preventDefault();
            });
        }


        $( '.nav__open' ).on( 'click', this.toggleMenuNavOpen );
        $( '.nav__close' ).on( 'click', this.toggleMenuNavClose );
        $( '.nav__main-menu--open' ).on( 'click', this.toggleMenuNavOpen );
    }

    toggleMenuNavOpen = () => {
        if ( 1023 > $( window ).width() ) {
            $( '.nav__open' ).removeClass( 'nav__mobile--visible' );
            $( '.nav__mobile-menu' ).toggleClass( 'nav__mobile-menu--visible' );
            $( '.nav__fluid' ).toggleClass( 'nav__mobile--scrolling' );
            $( 'body' ).addClass( 'home-no-scrolling' );
        } else {
            $( '.nav__main-menu' ).removeClass( 'nav__main-menu--visible' );
            $( '.nav__desktop--extended' ).toggleClass( 'nav--visible' );
        }
    }

    toggleMenuNavClose = () => {
        if ( 1023 > $( window ).width() ) {
            $( '.nav__open' ).toggleClass( 'nav__mobile--visible' );
            $( '.nav__mobile-menu' ).removeClass( 'nav__mobile-menu--visible' );
            $( '.nav__fluid' ).removeClass( 'nav__mobile--scrolling' );
            $( 'body' ).removeClass( 'home-no-scrolling' );
        } else {
            $( '.nav__main-menu' ).toggleClass( 'nav__main-menu--visible' );
            $( '.nav__desktop--extended' ).removeClass( ' nav--visible' );
        }
    }
}

new Navigation();
