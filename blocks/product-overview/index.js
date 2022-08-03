import './product-overview.scss';
import $ from 'jquery';
import copy from 'copy-to-clipboard';

class ProductOverview {
    constructor() {
        $( '.product-overview__share-option--copy' ).on( 'click', this.showSnackBar );
        $( '.product-overview__button-share' ).on( 'click', () => {
            $( '.product-overview__share' ).toggleClass( 'product-overview__share--active' );
        });
    }

    showSnackBar() {
        var snackButton = document.querySelector( '.product-overview__snackText' );
        $( '.product-overview__snackText' ).css( 'display', 'block' );

        setTimeout( () => {
            copy( window.location.href );
            $( '.product-overview__snackText' ).toggleClass( 'product-overview__snackText--show' );

            setTimeout( function() {
                snackButton.className = snackButton.className.replace( 'product-overview__snackText--show', '' );

                setTimeout( () => {
                    $( '.product-overview__snackText' ).css( 'display', 'none' );
                }, 500 );
            }, 3000 );
        }, 100 );
    }
}


new ProductOverview();
