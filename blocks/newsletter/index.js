import './newsletter.scss';
import $ from 'jquery';

class NewsletterForm {
	parent = null;

	constructor() {
		$( '.newsletter button.newsletter__button' )
			.on( 'click', ( e ) => {
				this.contactFormCareer( e, this );
			});
	}

	validateField( field, regex ) {
		const fieldToTest = field.val().trim();
		if ( '' === fieldToTest ) {
			return false;
		} else {
			return regex.test( field.val() );
		}
	}

	validateForm() {
		let valid = true;

		const textError = [
			'Field is required',
			'E-mail is invalid',
		];

		const regex = /^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+/;
		const field = this.parent.find( '.newsletter__email' );
		const fieldError = this.parent.find( '.newsletter__text-error' );

		fieldError
			.removeClass( 'newsletter__text-error--show' )
			.empty();
		if ( '' === field.val() ) {
			fieldError
				.addClass( 'newsletter__text-error--show' )
				.append( textError[0]);
			field
				.addClass( 'newsletter__input--error' );
			valid = false;
		} else if ( ! this.validateField( field, regex ) ) {
			fieldError
				.addClass( 'newsletter__text-error--show' )
				.append( textError[1]);
			field
				.addClass( 'newsletter__input--error' );
			valid = false;
		}

		return valid;
	}

	contactFormCareer( e, $this ) {
		e.preventDefault();
		$this.parent = $( e.target.closest( '.newsletter' ) );

		const isFormValid = $this.validateForm();

		if ( isFormValid ) {
			$this.parent
				.find( '.newsletter__form-valid' )
				.addClass( 'newsletter__form-valid--show' );
			$this.parent
				.find( '.newsletter__form' )
				.addClass( 'newsletter__form--hide' );
		}
	}
}

new NewsletterForm();
