import $ from 'jquery';

class Form {
    parent = null;
    optionsContainer = null;

    constructor() {
        $( '.select__box .select__selected' )
            .on( 'click', ( e ) => {
                this.selectFeature( e, this );
            });

        $( '.select div.select__option' )
            .on( 'click', ( e ) => {
                this.optionFeature( e, this );
            });
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
            if ( 1023 < window.innerWidth ) {
                this.optionsContainer.css({'maxHeight': ''});
            } else {
                if ( ! this.parent.hasClass( 'select--expand-on-top' ) )  {
                    console.log( true );
                    const selectHeight = window.innerHeight - this.parent.offset().top - window.scrollY - 160;
                    this.optionsContainer.css({'maxHeight': `${selectHeight}px`});
                }
            }
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
