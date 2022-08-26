import $ from 'jquery';
import copy from 'copy-to-clipboard';

class Share {
    constructor() {

        $( '.share__option-link' ).not( '.share__option-copy' ).on( 'click', function() {
            $( this ).closest( '.share' ).toggleClass( 'share--active' );
        });
        $( '.share__option-copy' ).on( 'click', this.showSnackBar );
        $( '.button-share' ).on( 'click', () => {
            $( '.share' ).toggleClass( 'share--active' );
        });
    }

    showSnackBar( e ) {
        let snackText = $( e.target )
            .closest( '.share' ).removeClass( 'share--active' )
            .next().css( 'display', 'block' );

        setTimeout( () => {
            copy( window.location.href );
            snackText.toggleClass( 'share__snackText--show' );

            setTimeout( function() {
                snackText.toggleClass( 'share__snackText--show' );

                setTimeout( () => {
                    snackText.css( 'display', 'none' );
                }, 500 );
            }, 3000 );
        }, 100 );
    }
}


new Share();
