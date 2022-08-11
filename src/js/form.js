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

    /**
     * open / close select box
     */
    selectFeature( e, $this ) {
        e.preventDefault();

        $this.parent = $( e.target.closest( '.form-select-box' ) );
        $this.optionsContainer = this.parent.find( '.form-options-container' );
        this.optionsContainer.css({'maxHeight': ''});

        if ( this.optionsContainer.hasClass( 'active' ) ) {
            this.optionsContainer.removeClass( 'active' );
        } else {
            $( '.form-options-container' ).removeClass( 'active' );
            this.optionsContainer.addClass( 'active' );
            if ( 1023 < window.innerWidth ) {
                this.optionsContainer.css({'maxHeight': ''});
            } else  {
                const selectHeight = window.innerHeight - this.parent.offset().top - window.scrollY - 160;
                this.optionsContainer.css({'maxHeight': `${selectHeight}px`});
            }
        }
    }

    /**
     * Change selected option
     */
    optionFeature( e ) {
        e.preventDefault();

        // set the value
        const option = $( e.target.closest( '.form-option' ) );
        const valueToSet = option.find( 'input' ).val();
        option.closest( '.form-select-box' )
            .find( 'input[type="hidden"]' )
            .val( valueToSet )
            .trigger( 'change' );
        option.find( 'input' ).prop( 'checked', true );

        // change the label and close dropdown
        const label = option.find( 'label' ).html();
        option.closest( '.form-select-box' ).find( '.form-select--selected' ).html( label );
        option.closest( '.form-options-container' ).removeClass( 'active' );
    }
}

new Form();
