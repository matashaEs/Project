import $ from 'jquery';

/**
 * Visual part of the sidebar and content (left gray bar with navigation and content on the right side)
 */
class QuickLinks {
    headerHeight = $( 'header' ).innerHeight();
    nav = $( '.nav__fluid' );
    titles = $( '.quick-links__open-button' );
    constructor() {
        this.changingContents();

        this.titles.on( 'click', ( e ) => {
                this.showSidebarOnMobile( e );
            }
        );

        $( '.page-navigation .page-navigation__button' )
            .on( 'click', ( e ) => {
                this.scrollToBlock( e, this );
            });


        window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
    }

    itemsClassChanger( selector, mobileClass, desktopClass, width = 767 ) {
        $( selector ).removeClass( mobileClass );
        $( selector ).removeClass( desktopClass );

        if ( width > screen.width ) {
            $( selector ).addClass( mobileClass );
        } else {
            $( selector ).addClass( desktopClass );
        }
    }

    showSidebarOnMobile( e ) {
        e.preventDefault();

        const title = $( e.target );
        const container = $( ( e.target ).closest( '.quick-links' ) ).find( '.quick-links__container' );

        /**
         * variables that help calculate sidebar height
         */
        const windowHeight = window.innerHeight - this.headerHeight;
        const containerScrollHeight = container[0].scrollHeigh;
        const containerHeight = windowHeight > containerScrollHeight ? containerScrollHeight : windowHeight;

        /**
         * variables that help "freeze" scrolling correctly
         */
        const windowScroll = window.scrollY;

        /**
         * shows sidebar, freeze scrolling; disable pointer events
         */
        if ( ! title.hasClass( 'quick-links__open-button--show' ) && 1023 > window.innerWidth ) {
            container.css({'maxHeight': `${containerHeight}px`});
            title.addClass( 'quick-links__open-button--show' );

            document.body.style.position = 'fixed';
            document.body.style.top      = `-${windowScroll}px`;
            this.nav.css( 'margin-top', `${windowScroll}px` );
            $( '.nav__mobile-menu' ).scroll();

            $( 'body' ).addClass( 'disable' );
        } else {
            this.hideSidebar();
        }
    }

    /**
     * hides mobile sidebar; disables scroll freeze; disables disabling pointer events
     */
    hideSidebar( doScroll = true ) {
        const scrollY = document.body.style.top;

        $( 'html' ).css( 'scroll-behavior', 'auto' );

        $( '.quick-links__container' ).each( function() {
            $( this ).css({'maxHeight': ''});
        });
        this.titles.removeClass( 'quick-links__open-button--show' );

        document.body.style.position = '';
        document.body.style.top      = '';
        this.nav.css( 'margin-top', '0' );

        $( 'body' ).removeClass( 'disable' );

        if ( doScroll ) {
            window.scrollTo( 0, parseInt( scrollY || '0' ) * -1 );
        }

        $( 'html' ).css( 'scroll-behavior', '' );
    }

    /**
     * controls sidebar bottom padding (removes bottom padding if sidebar height is smaller that window height)
     */
    sidebarPaddingBottom() {
        let columns = $( '.quick-links' );

        columns.removeClass( 'pb0' );

        if ( 0 !== columns.length && columns[0].scrollHeight <= window.innerHeight - 70 ) {
            columns.addClass( 'pb0' );
        }
    }

    /**
     * contains all the functions that should reload with the resizing of the screen
     */
    changingContents() {
        this.itemsClassChanger( '.quick-links .page-navigation__button', 'h4', 'p-large' );
        this.itemsClassChanger( '.quick-links .form-select--selected', 'h4', 'p-large' );

        this.sidebarPaddingBottom();
    }

    delay( callback, ms ) {
        clearTimeout( this.timer );
        this.timer = setTimeout( callback, ms );
    }

    resizeEvent() {
        this.delay(
            () => {
                this.changingContents();
                if ( 1023 < window.innerWidth ) {
                    this.hideSidebar( false );
                }
            },
            500
        );
    }

    scrollToBlock( e ) {
        if ( 1024 > window.innerWidth ) {
            e.preventDefault();

            const blockDom = $( `#${$( e.target ).data( 'blockId' )}` );

            this.hideSidebar();

            setTimeout( ()=> {
                $( 'html' ).animate({
                    scrollTop: blockDom.offset().top - 70
                });
            }, 200 );
        }
    }
}

new QuickLinks();
