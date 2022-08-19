import $ from 'jquery';

class Form {
    parent = null;
    optionsContainer = null;
    fields = null;

    regexes = {
        firstname: /^[\w ]{2,30}$/,
        lastname: /^(\w([-']?\w+)*)+$/,
        email: /^([a-zA-Z\d])+([.a-zA-Z\d_-])*@([a-zA-Z\d_-])+(.[a-zA-Z\d_-]+)+/,
        company: /^.{2,150}/,
        message: /^.{2,150}/,
        jobTitle: /^.{2,150}/,
    }

    constructor() {
        $( '.select__box .select__selected' )
            .on( 'click', ( e ) => {
                this.selectFeature( e, this );
            });

        $( '.select div.select__option' )
            .on( 'click', ( e ) => {
                this.optionFeature( e, this );
            });

        $( '.button__send-form' ).on( 'click', ( e ) => {
            this.sendDataFromForm( e, this );
        });

        $( '.input' ).focus( function() {
            if ( $( this ).hasClass( 'input--error' ) ) {
                $( this ).removeClass( 'input--error' );
                $( this ).next().removeClass( 'input__error--show' ).empty();
            }
        });
    }

    validateField( field ) {
        const fieldToTest = field.val().trim();
        if ( '' === fieldToTest ) {
            return false;
        } else {
            switch ( field.attr( 'name' ) ) {
                case 'firstname':   return this.regexes.firstname.test( field.val() );
                case 'lastname':    return this.regexes.lastname.test( field.val() );
                case 'email':       return this.regexes.email.test( field.val() );
                case 'company':     return this.regexes.company.test( field.val() );
                case 'message':     return this.regexes.message.test( field.val() );
                case 'jobTitle':    return this.regexes.jobTitle.test( field.val() );
                case 'product':     return true;
                default:            return false;
            }
        }
    }

    validateForm() {
        const outerValid = this.validateField.bind( this );

        let allFieldsAreValid = true;

        this.fields.removeClass( 'input--error' );
        this.parent.find( '.input__error' ).removeClass( 'input__error--show' ).empty();

        this.fields.each( function() {
            const errorField = 0 !== $( this ).next().length ? $( this ).next() : $( this ).closest( '.select' ).next();
            const fieldName = $( this ).attr( 'placeholder' );

            if ( '' === $( this ).val() ) {
                errorField.addClass( 'input__error--show' ).append( fieldName + ' is required' );

                if ( 'hidden' !== $( this ).attr( 'type' ) || 'TEXTAREA' === $( this ).prop( 'tagName' ) ) {
                    $( this ).addClass( 'input--error' );
                } else {
                    $( this ).closest( '.select' ).addClass( 'select--error' );
                }

                allFieldsAreValid = false;
            } else if ( ! outerValid( $( this ) ) ) {
                errorField.addClass( 'input__error--show' ).append( fieldName + ' is invalid' );
                $( this ).addClass( 'input--error' );
                allFieldsAreValid = false;
            }
        });

        if ( allFieldsAreValid ) {
            let data = {'fields': []};

            this.fields.each( function() {
                data.fields.push({'objectTypeId': '0-1', 'name': $( this ).attr( 'name' ), 'value': $( this ).val().trim()});
            });

            return data;
        } else {
            return false;
        }
    }

    hideShowForm( parent ) {
        $( parent.prev() ).toggleClass( 'hide' );
        parent.toggleClass( 'hide' );
        $( '.cai-map' ).toggleClass( 'hide' );
    }

    sendDataFromForm( e, $this ) {
        e.preventDefault();
        $this.parent = $( e.target.closest( 'form' ) );
        $this.fields = $this.parent.find( '.input' );

        const formData = $this.validateForm();

        if ( 'object' === typeof formData ) {
            $this.hideShowForm( $this.parent );

            if ( 1024 > window.innerWidth && ! $this.parent.hasClass( 'newsletter__form' ) ) {
                $this.parent.next()[0].scrollIntoView();
            }

            setTimeout( function() {
                $this.parent.next().addClass( 'form-valid--show' );
                $this.fields.val( '' );
            }, 500 );

            setTimeout( function() {
                $this.parent.next().removeClass( 'form-valid--show' );
            }, 5000 );

            setTimeout( function() {
                $this.hideShowForm( $this.parent );
            }, 5500 );

            /**
             * TODO: send dorm data
             */
        }
    }

    /**
     * open / close select box
     */
    selectFeature( e, $this ) {
        e.preventDefault();

        $this.parent = $( e.target.closest( '.select' ) );
        $this.optionsContainer = this.parent.find( '.select__options' );
        $( '.select__options' ).css({'maxHeight': ''});

        if ( this.optionsContainer.hasClass( 'active' ) ) {
            this.optionsContainer.removeClass( 'active' );
        } else {
            $( '.select__options' ).removeClass( 'active' );
            this.optionsContainer.addClass( 'active' );

            if ( 0 !== this.parent.closest( '.quick-links' ).length ) {
                if ( 1023 < window.innerWidth ) {
                    this.optionsContainer.css({'maxHeight': ''});
                } else {
                    if ( ! this.parent.hasClass( 'select--expand-on-top' ) ) {
                        const selectHeight = window.innerHeight - this.parent.offset().top - window.scrollY - 160;
                        this.optionsContainer.css({'maxHeight': `${selectHeight}px`});
                    }
                }
            }
        }

        if ( this.parent.hasClass( 'select--form' ) && this.parent.hasClass( 'select--error' ) ) {
            this.parent.removeClass( 'select--error' );
            this.parent.next().removeClass( 'input__error--show' ).empty();
        }
    }

    /**
     * Change selected option
     */
    optionFeature( e ) {
        e.preventDefault();

        // set the value
        const option = $( e.target.closest( '.select__option' ) );
        const valueToSet = option.find( 'input' ).val();
        option.closest( '.select__box' )
            .find( 'input[type="hidden"]' )
            .val( valueToSet )
            .trigger( 'change' );
        option.find( 'input' ).prop( 'checked', true );

        // change the label and close dropdown
        const label = option.find( 'label' ).html();
        option.closest( '.select__box' ).find( '.select__selected' ).find( '.select__selected-text' ).html( label );
        option.closest( '.select__options' ).removeClass( 'active' ).css({'maxHeight': ''});
    }
}

new Form();
