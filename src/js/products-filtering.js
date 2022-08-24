import $ from 'jquery';

/**
 * Filtering of products on Product Browser and Industry Browser.
 * Reloads page on selecting category/industry with refreshed query parameters.
 */
class ProductsFiltering {
    constructor() {
        $( 'input[name="category"]' ).on( 'change', this.setQueryParameter );
        $( 'input[name="industry"]' ).on( 'change', this.setQueryParameter );
    }

    setQueryParameter( e ) {
        let url = new URL( window.location.href );
        let parameters = url.searchParams;

        const parameter = $( e.target ).attr( 'name' );

        parameters.set( parameter, $( e.target ).val() );

        if ( '' === parameter ) {
            parameters.delete( parameter );
        }

        // change the search property of the main url
        url.search = parameters.toString();

        window.location.href = decodeURI( url.toString() );
    }
}

new ProductsFiltering();
