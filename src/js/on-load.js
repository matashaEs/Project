import $ from 'jquery';

class OnLoad {
    constructor() {
        const setSelectBind = this.setSelect.bind( this );
        const setRadioGroupBind = this.setRadioGroup.bind( this );

        window.onload = function( ) {
            const urlParams   = new URLSearchParams( window.location.search );

            setSelectBind( $( '.news__sidebar-industry' ),  urlParams.get( 'industry' ) );
            setSelectBind( $( '.news__sidebar-product' ),  urlParams.get( 'product-type' ) );
            setSelectBind( $( '.news__sidebar-content' ),  urlParams.get( 'content' ) );
            setSelectBind( $( '.product-sort__industry' ),  urlParams.get( 'industry' ) );

            setRadioGroupBind( 'category',  urlParams.get( 'category' ) );
        };
    }

    setSelect( option, value ) {
        option.find( '.select__box' )
            .find( 'input[type="hidden"]' )
            .val( value );

        const id = option.find( '.select__options' ).find( 'input[value="' + value + '"]' ).prop( 'checked', true ).attr( 'id' );
        const label = option.find( '.select__options' ).find( 'label[for="' + id + '"]' ).html();
        option.find( '.select__selected' ).find( '.select__selected-text' ).html( label );
    }

    setRadioGroup( name, value ) {
        $( '[name="' + name + '"][value="' + value + '"]' ).prop( 'checked', true );
    }
}

new OnLoad();
