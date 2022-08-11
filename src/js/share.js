import $ from 'jquery';
import copy from 'copy-to-clipboard';

class Share {
    constructor() {
        $( '.share__option-copy' ).on( 'click', this.showSnackBar );
        $( '.button-share' ).on( 'click', () => {
            $( '.share' ).toggleClass( 'share--active' );
        });
    }

    showSnackBar() {
        let snackButton = document.querySelector( '.share__snackText' );
        $( '.share__snackText' ).css( 'display', 'block' );

        setTimeout( () => {
            copy( window.location.href );
            $( '.share__snackText' ).toggleClass( 'share__snackText--show' );

            setTimeout( function() {
                snackButton.className = snackButton.className.replace( 'share__snackText--show', '' );

                setTimeout( () => {
                    $( '.share__snackText' ).css( 'display', 'none' );
                }, 500 );
            }, 3000 );
        }, 100 );
    }
}


new Share();
