import $ from 'jquery';

class Search {
	constructor() {
		this.timer = null;

		$( '#searchButton' ).on( 'click', this.searchText );
		$( '#searchField' ).on( 'keyup', this.searchText );
	}

	timerHandler = ( callback ) => {
		clearTimeout( this.timer );
		this.timer = setTimeout( callback, 1000 );
	};

	searchData = () => {
		$.ajax({
			method: 'GET',
			url: websiteData.rootUrl + '/wp-json/wp/v2/posts',
			success( results ) {
				results.forEach( ( result ) => {
					$( '#searchResults' ).append( `
                        <div>
                            <a href="${result.link}">${result.title.rendered}</a>
                        </div>
                        ` );
				});
			}
		});
	};

	searchText = () => {
		const toSearch = $( '#searchField' ).val();
		if ( '' !== toSearch ) {
			this.timerHandler( () => {
				this.searchData( toSearch );
			});
		}
	};
}

new Search();
