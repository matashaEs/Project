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
		$this.parent = $( e.target.closest( '.filters-and-content__col-filters' ) );

		const container	   	  = this.parent.find( '.filters-and-content__filters-container' );
		const title 		  = $( e.target );
		const windowScroll    = window.scrollY;
		const containerHeight = window.innerHeight > container[0].scrollHeight ? container[0].scrollHeight : window.innerHeight;
		const scrollY 		  = document.body.style.top;

		title.toggleClass( 'filters-and-content__filters-title--show' );

		if ( title.hasClass( 'filters-and-content__filters-title--show' ) ) {
			document.body.style.position = 'fixed';
			document.body.style.top 	 = `-${windowScroll}px`;
			container.css({'maxHeight': `${containerHeight}px`});
		} else {
			document.body.style.position = '';
			document.body.style.top 	 = '';
			window.scrollTo( 0, parseInt( scrollY || '0' ) * -1 );
			container.css({'maxHeight': '0'});
		}
	}
}

new FiltersAndContent();
