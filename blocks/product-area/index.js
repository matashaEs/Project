import './product-area.scss';
import $ from 'jquery';

class ProductArea {
    constructor() {
        $( '.product-area__heading' ).click(
            function() {
                if (  1024 > $( window ).width() ) {
                    $( '.product-area__content-title' ).removeClass( 'product-area__content-title--visible' );
                    $( '.product-area__content-description' ).slideUp();
                    $( this ).next( '.product-area__content' ).slideToggle();
                    $( this ).toggleClass( 'product-area__content--visible' );
                }
            }
        );
        $( '.product-area__content-title' ).click(
            function() {
                $( this ).next( '.product-area__content-description' ).slideToggle();
                $( this ).toggleClass( 'product-area__content-title--visible' );
            }
        );
    }
}

new ProductArea();
