import './privacy-policy-dropdowns.scss';
import $ from 'jquery';

class PrivacyPolicyDropdowns {
    constructor() {
        $( '.privacy-policy-dropdowns__item' ).on( 'click', ( e ) => {
            this.dropdownAnimation( e );
        });
    }

    dropdownAnimation( e ) {
        const itemShowClass = 'privacy-policy-dropdowns__item--show';
        const itemAnswerShowClass = 'privacy-policy-dropdowns__item-answer-container--show';

        const item = $( e.target );
        const answer = item.find( '.privacy-policy-dropdowns__item-answer-container' );

        /**
         * if item that was clicked is already open then it's close it
         * else it closes all other dropdowns and then opens one that was clicked
         */
        if ( item.hasClass( itemShowClass ) ) {
            answer.css( 'max-height', 0 ).removeClass( itemAnswerShowClass );
            item.removeClass( itemShowClass );
        } else {
            $( '.privacy-policy-dropdowns__item-answer-container' ).removeClass( itemAnswerShowClass ).css( 'max-height', '' );
            $( '.' + itemShowClass ).removeClass( itemShowClass );

            answer.css( 'max-height', answer[0].scrollHeight ).addClass( itemAnswerShowClass );
            item.addClass( itemShowClass );
        }
    }
}

new PrivacyPolicyDropdowns;
