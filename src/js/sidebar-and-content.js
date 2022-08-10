import $ from 'jquery';

class SidebarAndContent {
    constructor() {
        this.changingContents();

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

    /**
     * contains all the functions that should reload with the resizing of the screen
     */
    changingContents() {
        this.itemsClassChanger( '.sidebar-and-content__item-title', 'h3', 'h4' );
        this.itemsClassChanger( '.sidebar-and-content__item-tags', 'p', 'p-large' );
    }

    delay( callback, ms ) {
        clearTimeout( this.timer );
        this.timer = setTimeout( callback, ms );
    }

    resizeEvent() {
        this.delay(
            () => {
                this.changingContents();
            },
            500
        );
    }
}

new SidebarAndContent();
