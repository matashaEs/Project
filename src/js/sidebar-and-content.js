import $ from 'jquery';

/**
 * Visual part of the sidebar and content (left gray bar with navigation and content on the right side)
 */
class SidebarAndContent {
    headerHeight = $( 'header' ).innerHeight();
    nav = $( '.nav__fluid' );
    titles = $( '.sidebar-and-content .sidebar-and-content__sidebar-title' );
    elementsToDisable = $( 'body, .sidebar-and-content__container' ).children().not( 'script, svg, link, .sidebar-and-content, .sidebar-and-content__col-sidebar' );

    constructor() {
        this.changingContents();

        this.titles.on( 'click', ( e ) => {
                this.showSidebarOnMobile( e );
            }
        );

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
        const container = $( ( e.target ).closest( '.sidebar-and-content__col-sidebar' ) ).find( '.sidebar-and-content__sidebar-container' );

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
        const scrollY = document.body.style.top;

        /**
         * shows sidebar, freeze scrolling; disable pointer events
         */
        if ( ! title.hasClass( 'sidebar-and-content__sidebar-title--show' ) && 1023 > window.innerWidth ) {
            container.css({'maxHeight': `${containerHeight}px`});
            title.addClass( 'sidebar-and-content__sidebar-title--show' );

            document.body.style.position = 'fixed';
            document.body.style.top      = `-${windowScroll}px`;
            this.nav.css( 'margin-top', `${windowScroll}px` );
            $( '.nav__mobile-menu' ).scroll();

            this.elementsToDisable.addClass( 'disable' );
        } else {
            this.hideSidebar( container, title );
            window.scrollTo( 0, parseInt( scrollY || '0' ) * -1 );
        }
    }

    /**
     * hides mobile sidebar; disables scroll freeze; disables disabling pointer events
     */
    hideSidebar( container, title = this.titles ) {
        container.css({'maxHeight': ''});
        title.removeClass( 'sidebar-and-content__sidebar-title--show' );

        document.body.style.position = '';
        document.body.style.top      = '';
        this.nav.css( 'margin-top', '0' );

        this.elementsToDisable.removeClass( 'disable' );
    }

    /**
     * controls sidebar bottom padding (removes bottom padding if sidebar height is smaller that window height)
     */
    sidebarPaddingBottom() {
        let columns = $( '.sidebar-and-content__col-sidebar' );

        columns.removeClass( 'pb0' );

        if ( 0 !== columns.length && columns[0].scrollHeight <= window.innerHeight - 70 ) {
            columns.addClass( 'pb0' );
        }
    }

    /**
     * contains all the functions that should reload with the resizing of the screen
     */
    changingContents() {
        this.itemsClassChanger( '.sidebar-and-content__item-title', 'h3', 'h4' );
        this.itemsClassChanger( '.sidebar-and-content__item-tags', 'p', 'p-large' );
        this.itemsClassChanger( '.sidebar-and-content__col-sidebar .page-navigation__button', 'h4', 'p-large' );
        this.itemsClassChanger( '.sidebar-and-content__col-sidebar .form-select--selected', 'h4', 'p-large' );

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
                    this.hideSidebar( $( '.sidebar-and-content__sidebar-container' ) );
                }
            },
            500
        );
    }
}

new SidebarAndContent();
