import './privacy-policy-dropdowns.scss';
import $ from 'jquery';

class PrivacyPolicyDropdowns {
    constructor() {
        $( '.privacy-policy-dropdowns__item' ).on( 'click', ( e ) => {
            this.dropdownAnimation( e );
        });

        window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
    }

    dropdownAnimation( e ) {
        const itemShowClass = 'privacy-policy-dropdowns__item--show';
        const itemAnswerShowClass = 'privacy-policy-dropdowns__item-answer-container--show';

        const item = $( e.target );
        const answer = item.find( '.privacy-policy-dropdowns__item-answer-container' );
        const answerScrollHeight = answer[0].scrollHeight;

        /**
         * if item that was clicked is already open then it's close it
         * else it closes all other dropdowns and then opens one that was clicked
         */
        if ( item.hasClass( itemShowClass ) ) {
            answer.css( 'max-height', 0 ).removeClass( itemAnswerShowClass );
            item.removeClass( itemShowClass );
        } else {
            $( '.privacy-policy-dropdowns__item-answer-container' ).css( 'max-height', '' ).removeClass( itemAnswerShowClass );
            $( '.' + itemShowClass ).removeClass( itemShowClass );

            answer.css( 'max-height', answerScrollHeight ).addClass( itemAnswerShowClass );
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
                $( '.privacy-policy-dropdowns__item-answer-container--show' ).each( function() {
                    $( this ).css( 'max-height', $( this )[0].scrollHeight );
                });
            },
            500
        );
    }
}

new PrivacyPolicyDropdowns;
