import $ from 'jquery';

/**
 * Reloads page on selected option.
 */
class Filtering {
    constructor() {
        $( 'input[name="category"][type="radio"]:checked' ).on( 'click', this.unsetRadio );
        $( 'input[name="industry"]' ).on( 'change', this.setQueryParameter );
        $( 'input[name="category"]' ).on( 'change', this.setQueryParameter );
        $( 'input[name="content"]' ).on( 'change', this.setQueryParameter );
        $( 'input[name="support-product"]' ).on( 'change', this.setQueryParameter );
    }

    unsetRadio( e ) {
        $( e.target ).prop( 'checked', false ).trigger( 'change' );
    }

    setQueryParameter( e ) {
        let url = new URL( window.location.href );
        let parameters = url.searchParams;

        const parameter = $( e.target ).attr( 'name' );

		parameters.delete( parameter );
        if ( $( e.target ).val() && '' !== parameter ) {
            parameters.set( parameter, $( e.target ).val() );
        }

        if ( 'radio' === $( e.target ).attr( 'type' ) && ! $( e.target ).is( ':checked' )  ) {
            parameters.delete( parameter );
        }

        // change the search property of the main url
        url.search = parameters.toString();

        window.location.href = decodeURI( url.toString() );
    }
}

new Filtering();
