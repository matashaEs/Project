import './privacy-policy-dropdowns.scss';
import $ from 'jquery';

class PrivacyPolicyDropdowns {
    constructor() {
        this.changeTitleClass();
        window.addEventListener( 'resize', this.resizeEvent.bind( this ) );
    }

    changeTitleClass() {
        const content = $( '.privacy-policy-dropdowns__item-description > p' );
        const contentLi = $( '.privacy-policy-dropdowns__item-description > ul li' );
        const contentStrong = $( '.privacy-policy-dropdowns__item-description > ul li strong' );
        const contentDescription = $( '.privacy-policy-dropdowns__description ' );
        const contentDate = $( '.privacy-policy-dropdowns__date' );
        content.removeClass( 'p' );
        content.removeClass( 'p-large' );
        contentLi.removeClass( 'p' );
        contentLi.removeClass( 'p-large' );
        contentStrong.addClass( 'h5' );
        contentDescription.removeClass( 'p' );
        contentDescription.removeClass( 'p-large' );
        contentDate.removeClass( 'p' );
        contentDate.removeClass( 'h5' );

        if ( 1024 > window.innerWidth ) {
            content.addClass( 'p' );
            contentLi.addClass( 'p' );
            contentDescription.addClass( 'p' );
            contentDate.addClass( 'p' );
        } else {
            content.addClass( 'p-large' );
            contentLi.addClass( 'p-large' );
            contentDescription.addClass( 'p-large' );
            contentDate.addClass( 'h4' );
        }
    }

    delay( callback, ms ) {
        clearTimeout( this.timer );
        this.timer = setTimeout( callback, ms );
    }

    resizeEvent() {
        this.delay(
            () => {
                this.changeTitleClass();
            },
            500
        );
    }
}

new PrivacyPolicyDropdowns;
