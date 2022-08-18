import $ from 'jquery';

class Form {
    parent = null;
    optionsContainer = null;
    fields = null;

    regexes = {
        firstname: /^[\w ]{2,30}$/,
        lastname: /^(\w([-']?\w+)*)+$/,
        email: /^[a-zA-Z\d]([.!#$%&‘*+/=?^_`{|}~-]*[a-zA-Z\d]*)*[a-zA-Z\d]@[a-zA-Z\d](?:[a-zA-Z\d-]{0,61}[a-zA-Z\d])?(?:\.[a-zA-Z\d](?:[a-zA-Z\d-]{0,61}[a-zA-Z\d])?)*$/,
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
            this.sendDataFromForm ( e, this );
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
                case 'company': return this.regexes.company.test( field.val() );
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

        this.fields.each( function( ) {
            const errorField = 0 !== $( this ).next().length ? $( this ).next() :  $( this ).closest( '.select' ).next();
            const fieldName = $( this ).attr( 'placeholder' );

            if ( '' === $( this ).val() ) {
                errorField.addClass( 'input__error--show' ).append( fieldName  + ' is required' );

                if ( 'hidden' !== $( this ).attr( 'type' ) || 'TEXTAREA' === $( this ).prop( 'tagName' ) ) {
                    $( this ).addClass( 'input--error' );
                } else {
                    $( this ).closest( '.select' ).addClass( 'select--error' );
                }

                allFieldsAreValid = false;
            } else if ( ! outerValid( $( this ) ) ) {
                errorField.addClass( 'input__terror--show' ).append( fieldName + ' is invalid' );
                $( this ).addClass( 'input--error' );
                allFieldsAreValid = false;
            }
        });

        if ( allFieldsAreValid ) {
            let data = { 'fields': [] };

            this.fields.each( function( ) {
                data.fields.push({ 'objectTypeId': '0-1', 'name': $( this ).attr( 'name' ), 'value': $( this ).val().trim() });
            });

            return data;
        } else {
            return false;
        }
    }

    sendDataFromForm( e, $this ) {
        e.preventDefault();
        $this.parent = $( e.target.closest( 'form' ) );
        $this.fields = $this.parent.find( '.input' );

        $( $this.parent.prev() ).addClass( 'hide' );
        $this.parent.addClass( 'hide' );
        $( '.cai-map' ).addClass( 'hide' );

        if ( 1024 > window.innerWidth ) {
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
            $( $this.parent.prev() ).removeClass( 'hide' );
            $this.parent.removeClass( 'hide' );
            $( '.cai-map' ).removeClass( 'hide' );
        }, 5500 );

        // const formData = $this.validateForm();
        //
        // if ( 'object' === typeof formData ) {
        //     let xhr = new XMLHttpRequest();
        //     let url = 'https://api.hsforms.com/submissions/v3/integration/submit/' + $this.parent.attr( 'portal' ) + '/' + $this.parent.attr( 'id' );
        //
        //     let finalData = JSON.stringify( formData );
        //
        //     xhr.open( 'POST', url );
        //
        //     // Sets the value of the 'Content-Type' HTTP request headers to 'application/json'
        //     xhr.setRequestHeader( 'Content-Type', 'application/json' );
        //
        //     xhr.onreadystatechange = function() {
        //         if ( 4 === xhr.readyState && 200 === xhr.status ) {
        //
        //             // Returns a 200 response if the submission is successful.
        //             alert( xhr.responseText );
        //             $this.parent.next().addClass( 'form-valid--show' );
        //             $this.parent.prev().addClass( 'hide' );
        //             $this.parent.addClass( 'hide' );
        //         } else if ( 4 === xhr.readyState && 400 === xhr.status ) {
        //             alert( xhr.responseText ); // Returns a 400 error the submission is rejected.
        //         } else if ( 4 === xhr.readyState && 403 === xhr.status ) {
        //             alert( xhr.responseText ); // Returns a 403 error if the portal isn't allowed to post submissions.
        //         } else if ( 4 === xhr.readyState && 404 === xhr.status ) {
        //             alert( xhr.responseText ); //Returns a 404 error if the formGuid isn't found
        //         }
        //     };
        //
        //     // Sends the request
        //
        //     xhr.send( finalData );
        // }
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
                    if ( ! this.parent.hasClass( 'select--expand-on-top' ) )  {
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
