import $ from 'jquery';

class PostsFiltering {
	constructor() {
		$( 'input[name="newsContentType"]' ).on( 'change', this.setParametersNews );
		$( 'input[name="newsProduct"]' ).on( 'change', this.setParametersNews );
		$( 'input[name="newsIndustry"]' ).on( 'change', this.setParametersNews );
	}


	setParametersNews( ) {

		const labelIndustry = $( '.news__sidebar-industry' ).find( 'input[type="hidden"]' ).val();

		const labelProduct = $( '.news__sidebar-product' ).find( 'input[type="hidden"]' ).val();

		const labelContent = $( '.news__sidebar-content' ).find( 'input[type="hidden"]' ).val();

		let url        = new URL( window.location.href );
		let parameters = url.searchParams;

		parameters.set( 'industry', labelIndustry );
		parameters.set( 'product-type', labelProduct );
		parameters.set( 'content', labelContent );

		if ( '' === labelIndustry ) {
			parameters.delete( 'industry', labelIndustry );
		}

		if ( '' === labelProduct ) {
			parameters.delete( 'product-type', labelProduct );
		}

		if ( '' === labelContent ) {
			parameters.delete( 'content', labelContent );
		}

		// change the search property of the main url
		url.search = parameters.toString();

		// the new url string
		let newUrl = url.toString();


		window.location.href = decodeURI( newUrl );
	}
}

new PostsFiltering();
