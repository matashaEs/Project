import './browse-scroll.scss';
import $ from 'jquery';

class BrowseScroll {
	constructor() {
		this.slider();
	}

	slider() {
		$('.browse-scroll__items-list').slick({
			infinite: false,
			arrows: false,
			dots: true,
		});
	}
}

new BrowseScroll();
