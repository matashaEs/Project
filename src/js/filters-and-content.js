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
		$this.grandparent = $( e.target.closest( '.filters-and-content' ) );
		$this.parent 	  = $( e.target.closest( '.filters-and-content__col-filters' ) );

		$('body').toggleClass( 'no-scroll' );

		this.parent
			.find( '.filters-and-content__filters-container' )
			.toggleClass( 'filters-and-content__filters-container--show' );

		$( e.target ).toggleClass( 'filters-and-content__filters-title--show' );
	}
}

new FiltersAndContent();
