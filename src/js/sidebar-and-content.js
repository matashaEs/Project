import $ from 'jquery';

class SidebarAndContent {
    parent = null;

    constructor() {
        $( '.sidebar-and-content .sidebar-and-content__sidebar-title' ).on( 'click', ( e ) => {
                this.showSidebarOnMobile( e, this );
            }
        );

        this.itemsClassChanger( '.sidebar-and-content__item-title', 'h3', 'h4' );
        this.itemsClassChanger( '.sidebar-and-content__item-tags', 'p', 'p-large' );
        this.itemsClassChanger( '.sidebar-and-content__col-sidebar .page-navigation__button', 'h4', 'p-large' );
        this.itemsClassChanger( '.sidebar-and-content__col-sidebar .form-select--selected', 'h4', 'p-large' );

        $( 'input[name="productCategory"]' ).change( this.categoryChanged );
    }

    itemsClassChanger( selector, mobileClass, desctopClass, width = 767 ) {
        if ( width > screen.width ) {
            $( selector ).addClass( mobileClass );
        } else {
            $( selector ).addClass( desctopClass );
        }
    }

    showSidebarOnMobile( e, $this ) {
        e.preventDefault();
        $this.parent = $( e.target.closest( '.sidebar-and-content__col-sidebar' ) );

        const container = this.parent.find( '.sidebar-and-content__sidebar-container' );
        const title = $( e.target );
        const windowScroll = window.scrollY;
        const containerHeight = window.innerHeight > container[0].scrollHeight ? container[0].scrollHeight : window.innerHeight;
        const scrollY = document.body.style.top;

        title.toggleClass( 'sidebar-and-content__sidebar-title--show' );

        /**
         * stops body scroll while sidebar is shown on mobile / tablet
         * and shows the sidebar ( set its max-height )
         */
        if ( title.hasClass( 'sidebar-and-content__sidebar-title--show' ) ) {
            document.body.style.position = 'fixed';
            document.body.style.top = `-${windowScroll}px`;

            container.css({'maxHeight': `${containerHeight}px`});
        } else {
            document.body.style.position = '';
            document.body.style.top = '';
            window.scrollTo( 0, parseInt( scrollY || '0' ) * -1 );

            container.css({'maxHeight': '0'});
        }
    }

    categoryChanged( e ) {
        console.log( e );
        console.log( 'category' );
    }
}

new SidebarAndContent();
