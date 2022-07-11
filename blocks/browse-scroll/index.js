import './browse-scroll.scss';
import $ from 'jquery';

class BrowseScroll {
	constructor() {
		// this.slider();
	}

	slider() {
		$( '.browse-scroll__items-list' ).slick({
			infinite: true,
			slidesToShow: 2,
			slidesToScroll: 1,
			arrows: false,
			dots: true,
		});
	}
}

new BrowseScroll();
