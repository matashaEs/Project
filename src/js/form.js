import $ from 'jquery';

export class Form {
    parent = null;
    optionsContainer = null;
    fields = null;
    formErrorField = null;

    regexes = {
        firstname: /^[\w ]{2,30}$/,
        lastname: /^(\w([-']?\w+)*)+$/,
        email: /^([a-zA-Z\d])+([.a-zA-Z\d_-])*@([a-zA-Z\d_-])+(.[a-zA-Z\d_-]+)+/,
        text: /^.{2,150}/,
    }

    constructor() {}

    addListeners() {
        $( '.select__box .select__selected' )
            .on( 'click', ( e ) => {
                this.selectFeature( e );
            });

        $( '.select div.select__option' )
            .on( 'click', ( e ) => {
                this.optionFeature( e );
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
                case 'firstname':           return this.regexes.firstname.test( field.val() );
                case 'lastname':            return this.regexes.lastname.test( field.val() );
                case 'email':               return this.regexes.email.test( field.val() );
                case 'company':
                case 'message':
                case 'interest':
                case 'jobtitle':            return this.regexes.text.test( field.val() );
                case 'product':
                case 'product-download':    return true;
                default:                    return false;
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

            this.fields.not( 'input[name="product-download"]' ).each( function() {
                const value = 'product' === $( this ).attr( 'name' ) ? $( this ).prev().find( '.select__selected-text' ).html() : $( this ).val().trim();
                data.fields.push({'objectTypeId': '0-1', 'name': $( this ).attr( 'name' ), 'value': value});
            });

            return data;
        } else {
            return false;
        }
    }

    hideShowFormForSuccess() {
        this.parent.find( '.button__send-form' ).toggleClass( 'disable' );
        $( this.parent.prev() ).toggleClass( 'hide' );
        this.parent.toggleClass( 'hide' );
        $( '.cai-map' ).toggleClass( 'hide' );

        if ( 1024 > window.innerWidth && ! this.parent.hasClass( 'newsletter__form' ) ) {
            this.parent.next()[0].scrollIntoView();
        }
    }

    hideShowFormForError() {
        this.parent.find( '.input-form' ).toggleClass( 'hide' );
        this.parent.find( '.button__send-form' ).toggleClass( 'hide' ).toggleClass( 'disable' );
    }

    sendDataFromForm( e, $this ) {
        e.preventDefault();
        $this.parent = $( e.target.closest( 'form' ) );
        $this.fields = $this.parent.find( '.input' );
        $this.formErrorField = $this.parent.children().last();

        const formData = $this.validateForm();

        if ( 'object' === typeof formData ) {
            let xhr = new XMLHttpRequest();
            let url = 'https://api.hsforms.com/submissions/v3/integration/submit/' + websiteData.portalID + '/' + $this.parent.attr( 'id' );

            let finalData = JSON.stringify( formData );

            xhr.open( 'POST', url );

            // Sets the value of the 'Content-Type' HTTP request headers to 'application/json'
            xhr.setRequestHeader( 'Content-Type', 'application/json' );

            xhr.onreadystatechange = function() {
                if ( 4 === xhr.readyState ) {

                    if ( 200 === xhr.status ) {
                        $this.hideShowFormForSuccess();

                        setTimeout( function() {
                            $this.parent.next().addClass( 'form-valid--show' );
                            $this.fields.not( '[name="product-download"]' ).val( '' );

                            $this.parent.find( 'input[type="hidden"].input' ).not( '[name="product-download"]' ).each( function() {
                                $( this ).prev().find( '.select__selected-text' ).html( $( this ).attr( 'placeholder' ) );
                            });

                            $this.parent.find( 'input[type="radio"]' ).not( '[name="product-download-radio"]' ).each( function() {
                                $( this ).prop( 'checked', false );
                            });
                        }, 400 );

                        const downloadDatasheet = $( '.download_datasheet' )[0];

                        if ( downloadDatasheet ) {
                            setTimeout( function() {
                                downloadDatasheet.click();
                            }, 2000 );
                        }

                        setTimeout( function() {
                            $this.parent.next().removeClass( 'form-valid--show' );
                        }, 5000 );

                        setTimeout( function() {
                            $this.hideShowFormForSuccess();
                        }, 5500 );
                    } else if ( 400 === xhr.status || 403 === xhr.status || 404 === xhr.status ) {
                        $this.hideShowFormForError();

                        setTimeout( function() {
                            $this.formErrorField.addClass( 'form-error--show' );
                        }, 500 );

                        setTimeout( function() {
                            $this.formErrorField.removeClass( 'form-error--show' );
                        }, 4000 );

                        setTimeout( function() {
                            $this.hideShowFormForError();
                        }, 4500 );
                    }
                }
            };

            // Sends the request

            xhr.send( finalData );
        }
    }

    /**
     * open / close select box
     */
    selectFeature( e ) {
        e.preventDefault();

        const selectOptionsSelector = '.select__options';
        const parent = $( e.target.closest( '.select' ) );
        const optionsContainer = parent.find( selectOptionsSelector );
        $( selectOptionsSelector ).css({'maxHeight': ''});

        if ( optionsContainer.hasClass( 'active' ) ) {
            optionsContainer.removeClass( 'active' );
        } else {
            $( '.select__options' ).removeClass( 'active' );
            optionsContainer.addClass( 'active' );
            if ( 0 !== parent.closest( '.quick-links' ).length ) {
                if ( 1023 < window.innerWidth ) {
                    optionsContainer.css({'maxHeight': ''});
                } else {
                    if ( ! parent.hasClass( 'select--expand-on-top' ) ) {
                        const selectHeight = window.innerHeight - parent.offset().top - window.scrollY - 160;
                        optionsContainer.css({'maxHeight': `${selectHeight}px`});
                    }
                }
            }
        }

        if ( !  parent.hasClass( 'select--customer-support' )  && parent.hasClass( 'select--form' ) && parent.hasClass( 'select--error' ) ) {
            parent.removeClass( 'select--error' );
            parent.next().removeClass( 'input__error--show' ).empty();
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
        const label = option.find( 'label' ).html();
        const inputHidden = option.closest( '.select__box' ).find( 'input[type="hidden"]' );

        if ( option.find( '.input__radio--filters' ).attr( 'value' ) === inputHidden.attr( 'value' ) ) {
            inputHidden
                .val( '' )
                .trigger( 'change' );
            option.find( 'input' ).prop( 'checked', false );

            // change the label and close dropdown
            option.closest( '.select__box' ).find( '.select__selected' ).find( '.select__selected-text' ).html( inputHidden.attr( 'placeholder' ) );
        } else {
            inputHidden
                .val( valueToSet )
                .trigger( 'change' );
            option.find( 'input' ).prop( 'checked', true );

            // change the label and close dropdown
            option.closest( '.select__box' ).find( '.select__selected' ).find( '.select__selected-text' ).html( label );
        }

        option.closest( '.select__options' ).removeClass( 'active' ).css({'maxHeight': ''});

        // reload download page on select product.
        if ( 'product-download-radio' === option.find( 'input' ).attr( 'name' ) ) {
            let url = new URL( window.location.href );

            url.searchParams.set( 'download-product', valueToSet );

            // change the search property of the main url
            url.search = url.searchParams.toString();

            window.location.href = decodeURI( url.toString() );
        }
    }
}

const form = new Form();
form.addListeners();
