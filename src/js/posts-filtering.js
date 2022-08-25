import $ from 'jquery';

class PostsFiltering {
	constructor() {
		$( 'input[name="newsContentType"]' ).on( 'change', this.setParametersNews );
		$( 'input[name="newsProduct"]' ).on( 'change', this.setParametersNews );
		$( 'input[name="newsIndustry"]' ).on( 'change', this.setParametersNews );

		window.onload = function( ) {
			const queryString = window.location.search;
			const urlParams   = new URLSearchParams( queryString );

			const parameterProduct = urlParams.get( 'category' );

			const parameterIndustry = urlParams.get( 'industry' );

			const parameterContent = urlParams.get( 'content' );

			const optionIndustry = $( '.news__sidebar-industry' );
			optionIndustry.find( '.select__box' )
				.find( 'input[type="hidden"]' )
				.val( parameterIndustry );

			const optionProduct = $( '.news__sidebar-product' );
			optionProduct.find( '.select__box' )
				.find( 'input[type="hidden"]' )
				.val( parameterProduct );

			const optionContent = $( '.news__sidebar-content' );
			optionContent.find( '.select__box' )
				.find( 'input[type="hidden"]' )
				.val( parameterContent );

			const idIndustry = optionIndustry.find( '.select__options' ).find( 'input[value="' + parameterIndustry + '"]' ).attr( 'id' );

			const labelIndustry = optionIndustry.find( '.select__options' ).find( 'label[for="' + idIndustry + '"]' ).html();

			optionIndustry.find( '.select__selected' ).find( '.select__selected-text' ).html( labelIndustry );

			const idProduct = optionProduct.find( '.select__options' ).find( 'input[value="' + parameterProduct + '"]' ).attr( 'id' );

			const labelProduct = optionProduct.find( '.select__options' ).find( 'label[for="' + idProduct + '"]' ).html();

			optionProduct.find( '.select__selected' ).find( '.select__selected-text' ).html( labelProduct );

			const idContent = optionContent.find( '.select__options' ).find( 'input[value="' + parameterContent + '"]' ).attr( 'id' );

			const labelContent = optionContent.find( '.select__options' ).find( 'label[for="' + idContent + '"]' ).html();

			optionContent.find( '.select__selected' ).find( '.select__selected-text' ).html( labelContent );

		};
	}


	setParametersNews( ) {

		const labelIndustry = $( '.news__sidebar-industry' ).find( 'input[type="hidden"]' ).val();

		const labelProduct = $( '.news__sidebar-product' ).find( 'input[type="hidden"]' ).val();

		const labelContent = $( '.news__sidebar-content' ).find( 'input[type="hidden"]' ).val();

		let url        = new URL( window.location.href );
		let parameters = url.searchParams;

		parameters.set( 'industry', labelIndustry );
		parameters.set( 'category', labelProduct );
		parameters.set( 'content', labelContent );

		if ( '' === labelIndustry ) {
			parameters.delete( 'industry', labelIndustry );
		}

		if ( '' === labelProduct ) {
			parameters.delete( 'category', labelProduct );
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
