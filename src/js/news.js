import $ from 'jquery';

class News {
    constructor() {
        $( 'input[name="productCategory"]' ).on( 'change', this.count );
        $( 'input[name="industry"]' ).on( 'change', this.count );
        $( 'input[name="industryType"]' ).on( 'change', this.count );
    }

    count( e ) {

        // let x = $( '.news__button' ).text().length;
        console.log( $( e.target ).val().substr( 0, 5 ) );
    }
}


new News();
