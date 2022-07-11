import $ from 'jquery';

class Form {
	parent = null;

	constructor() {
		$('.form-select-box .form-select--selected')
			.on('click', (e) => {
				this.selectFeature(e, this)
			});

		$('.form-select div.option')
			.on('click', (e) => {
				this.optionFeature(e, this)
			});
	}

	selectFeature(e, $this) {
		e.preventDefault();
		$this.parent = $(e.target.closest('.form-select-box'));

		this.parent
			.find('.form-options-container')
			.toggleClass("active")
	}

	optionFeature(e, $this) {
		console.log("lol");
		if ($(e.target).prop("tagName") != "INPUT") {
			$this.parent = $(e.target.closest('.form-options-container'));
			const option = $(e.target.closest('.option'));

			option.find('input').prop("checked", true);
			this.parent.next().html(option.find('label').html())
			this.parent.removeClass("active");
		}
	}
}
new Form();
