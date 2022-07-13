import $ from 'jquery';

class FiltersAndContent {
	parent = null;

	constructor() {
		$( '.filters-and-content .filters-and-content__filters-title' ).on( 'click', ( e ) => {
				this.showFilters( e, this );
			}
		);

	}

	showFilters( e, $this ) {
		e.preventDefault();
		$this.parent 	= $( e.target.closest( '.filters-and-content__col-filters' ) );
		const container = this.parent.find( '.filters-and-content__filters-container' );

		container.toggleClass( 'filters-and-content__filters-container--show' );

		$( e.target ).toggleClass( 'filters-and-content__filters-title--show' );

		if ( container.hasClass( 'filters-and-content__filters-container--show' ) ) {
			document.body.style.position = 'fixed';
			document.body.style.top 	 = `-${window.scrollY}px`;
		} else {
			const scrollY 				 = document.body.style.top;
			document.body.style.position = '';
			document.body.style.top 	 = '';
			window.scrollTo( 0, parseInt( scrollY || '0' ) * -1 );
		}
	}
}

new FiltersAndContent();
