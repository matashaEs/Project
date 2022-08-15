import './overview-with-dropdowns.scss';
import $ from 'jquery';

class OverviewWithDropdowns {
    constructor() {
        $( '.overview-with-dropdowns__item' ).on( 'click', ( e ) => {
            this.dropdownAnimation( e );
        });

        this.onScreenWidthChange();

        window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
    }

    dropdownAnimation( e ) {
        const itemShowClass = 'overview-with-dropdowns__item--show';
        const itemAnswerShowClass = 'overview-with-dropdowns__item-description-container--show';

        const item = $( e.target );
        const answer = item.find( '.overview-with-dropdowns__item-description-container' );
        const answerScrollHeight = answer[0].scrollHeight;

        /**
         * if item that was clicked is already open then it's close it
         * else it closes all other dropdowns and then opens one that was clicked
         */
        if ( item.hasClass( itemShowClass ) ) {
            answer.css( 'max-height', 0 ).removeClass( itemAnswerShowClass );
            item.removeClass( itemShowClass );
        } else {
            $( '.overview-with-dropdowns__item-description-container' ).css( 'max-height', '' ).removeClass( itemAnswerShowClass );
            $( '.' + itemShowClass ).removeClass( itemShowClass );

            answer.css( 'max-height', answerScrollHeight ).addClass( itemAnswerShowClass );
            item.addClass( itemShowClass );
        }
    }

    itemsClassChanger( elements, mobileClass, desktopClass, width = 1199 ) {
        elements.removeClass( mobileClass );
        elements.removeClass( desktopClass );

        if ( width > screen.width ) {
            elements.addClass( mobileClass );
        } else {
            elements.addClass( desktopClass );
        }
    }

    onScreenWidthChange() {
        this.itemsClassChanger( $( '.overview-with-dropdowns__item' ), 'h4', 'p-large', 1023 );
    }

    delay( callback, ms ) {
        clearTimeout( this.timer );
        this.timer = setTimeout( callback, ms );
    }

    resizeEvent() {
        this.delay(
            () => {
                $( '.overview-with-dropdowns__item-description-container--show' ).each( function() {
                    $( this ).css( 'max-height', $( this )[0].scrollHeight );
                });

                this.onScreenWidthChange();
            },
            500
        );
    }
}

new OverviewWithDropdowns;
