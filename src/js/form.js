import $ from 'jquery';

class Form {
	parent = null;
	optionsContainer = null;

	constructor() {
		$( '.form-select-box .form-select--selected' )
			.on( 'click', ( e ) => {
				this.selectFeature( e, this );
			});

			$( '.form-select div.form-option' )
				.on( 'click', ( e ) => {
					this.optionFeature( e, this );
				});
	}

	selectFeature( e, $this ) {
		e.preventDefault();
		$this.parent = $( e.target.closest( '.form-select-box' ) );
		$this.optionsContainer = this.parent.find( '.form-options-container' );

		if ( this.optionsContainer.hasClass( 'active' ) ) {
			this.optionsContainer.removeClass( 'active' );
		} else {
			$( '.form-options-container' ).removeClass( 'active' );
			this.optionsContainer.addClass( 'active' );
		}
	}

	optionFeature( e, $this ) {
		if ( 'INPUT' !== $( e.target ).prop( 'tagName' ) ) {
			$this.parent = $( e.target.closest( '.form-options-container' ) );
			const option = $( e.target.closest( '.form-option' ) );

			option.find( 'input' ).prop( 'checked', true );
			this.parent.next().html( option.find( 'label' ).html() );
			this.parent.removeClass( 'active' );
		}
	}
}

new Form();
