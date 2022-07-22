import $ from 'jquery';

/**
 * Visual part of the sidebar and content (left gray bar with navigation and content on the right side)
 */
class SidebarAndContent {
    parent = null;
    header = $( 'header' );
    nav = $( '.nav__fluid' );
    content = $( '.content' );
    titles = $( '.sidebar-and-content .sidebar-and-content__sidebar-title' );

    constructor() {
        this.changingContents();

        this.titles.on( 'click', ( e ) => {
                this.showSidebarOnMobile( e, this );
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

    showSidebarOnMobile( e, $this ) {
        e.preventDefault();

        $this.parent = $( ( e.target ).closest( '.sidebar-and-content__col-sidebar' ) );

        /*
         * helper elements:
         *     header: to disable while sidebar is open and for calculating available screen height
         *     nav: to hide menu if it's open
         *     content: for scroll (contains all page content except header)
        */
        const headerHeight = this.header.innerHeight();

        const container = this.parent.find( '.sidebar-and-content__sidebar-container' );
        const title = $( e.target );

        const windowScroll = window.scrollY - headerHeight;
        const windowHeight = window.innerHeight - headerHeight;
        const containerScrollHeight = container[0].scrollHeigh;
        const containerHeight = windowHeight > containerScrollHeight ? containerScrollHeight : windowHeight;
        const scrollY = this.content.position().top - headerHeight;

        this.header.css({ 'pointer-events': '', cursor: '' });

        /**
         * stops body scroll while sidebar is shown on mobile / tablet
         * and shows the sidebar ( set its max-height )
         */
        if ( ! title.hasClass( 'sidebar-and-content__sidebar-title--show' ) && 1023 > window.innerWidth ) {
            this.hideNav();

            this.content.css({position: 'fixed', top: `-${windowScroll}px`});
            container.css({'maxHeight': `${containerHeight}px`});

            title.addClass( 'sidebar-and-content__sidebar-title--show' );
        } else {
            this.hideSidebar( scrollY, container );
        }
    }

    hideNav() {
        if ( this.nav.hasClass( 'nav__mobile--scrolling' ) ) {
            $( '.nav__open' ).toggleClass( 'nav__mobile--visible' );
            $( '.nav__mobile-menu' ).toggleClass( 'nav__mobile-menu--visible' );
            this.nav.toggleClass( 'nav__mobile--scrolling' );
            $( 'body' ).toggleClass( 'home-no-scrolling' );
            $( '.nav__main-menu' ).toggleClass( 'nav__main-menu--visible' );
            $( '.nav__desktop--extended' ).toggleClass( 'nav--visible' );
            this.header.css({ 'pointer-events': 'none', cursor: 'default' });
        }
    }

    hideSidebar( scrollY, container, title ) {
        this.content.css({position: '', top: ''});
        window.scrollTo( 0, parseInt( scrollY || '0' ) * -1 );

        container.css({'maxHeight': ''});
        title.removeClass( 'sidebar-and-content__sidebar-title--show' );
        this.header.css({ 'pointer-events': '', cursor: '' });
        console.log( scrollY, container, title );
    }

    sidebarPaddingBottom() {
        let columns = $( '.sidebar-and-content__col-sidebar' );

        columns.removeClass( 'pb0' );

        if ( columns[0].scrollHeight <= window.innerHeight - 70 ) {
            columns.addClass( 'pb0' );
        }
    }

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

                if ( 1023 > window.innerWidth ) {
                    this.hideNav();
                }

                this.hideSidebar( 0, $( '.sidebar-and-content__sidebar-container' ), this.titles );
            },
            500
        );
    }
}

new SidebarAndContent();
