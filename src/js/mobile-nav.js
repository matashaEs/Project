import $ from 'jquery';

class Navigation {
    constructor() {
        this.body = $( 'body' );
        $('.menu-item-has-children > a').click(function (e) {
            e.preventDefault();
            $(this).next('.sub-menu').slideToggle();
            $('.menu-item-has-children').toggleClass('nav__mobile-menu-item--chosen')
        });


        $( '.nav__open' ).on( 'click', this.toggleMenuNavOpen );
        $( '.nav__close' ).on( 'click', this.toggleMenuNavClose );
    }

    toggleMenuNavOpen = () => {
        if ($(window).width() < 1023) {
            $(".nav__open").removeClass('nav__mobile--visible')
            $(".nav__mobile-menu").toggleClass('nav__mobile-menu--visible')
            $(".nav__fluid").toggleClass('nav__mobile--scrolling')
            $("body").addClass('home--no-scrolling')
        }
    }

    toggleMenuNavClose = () => {
        if ($(window).width() < 1023) {
            $(".nav__open").toggleClass('nav__mobile--visible')
            $(".nav__mobile-menu").removeClass('nav__mobile-menu--visible')
            $(".nav__fluid").removeClass('nav__mobile--scrolling')
            $("body").removeClass('home--no-scrolling')
        }
    }
}

new Navigation();
