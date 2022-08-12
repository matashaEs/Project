import $ from 'jquery';

class PageCareers {
    constructor() {
        $( '.page-careers__career-option:not(.page-careers__career-option--no-content)' ).on( 'click', ( e ) => {
            this.dropdownAnimation( e );
        });

        window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
    }

    dropdownAnimation( e ) {
        const itemShowClass = 'page-careers__career-option--show';
        const itemDescriptionShowClass = 'page-careers__option-description-container--show';

        const item = $( e.target );
        const description = item.find( '.page-careers__option-description-container' );
        const descriptionScrollHeight = description[0].scrollHeight;

        /**
         * if item that was clicked is already open then it's close it
         * else it closes all other dropdowns and then opens one that was clicked
         */
        if ( item.hasClass( itemShowClass ) ) {
            description.css( 'max-height', 0 ).removeClass( itemDescriptionShowClass );
            item.removeClass( itemShowClass );
        } else {
            $( '.page-careers__option-description-container' ).css( 'max-height', '' ).removeClass( itemDescriptionShowClass );
            $( '.' + itemShowClass ).removeClass( itemShowClass );

            description.css( 'max-height', descriptionScrollHeight ).addClass( itemDescriptionShowClass );
            item.addClass( itemShowClass );
        }
    }

    delay( callback, ms ) {
        clearTimeout( this.timer );
        this.timer = setTimeout( callback, ms );
    }

    resizeEvent() {
        this.delay(
            () => {
                $( '.page-careers__option-description-container--show' ).each( function() {
                    $( this ).css( 'max-height', $( this )[0].scrollHeight );
                });
            },
            500
        );
    }
}

new PageCareers;
