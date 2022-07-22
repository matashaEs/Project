import './two-columns.scss';
import $ from 'jquery';

class Dropdown {
    constructor() {
        $( '.two-columns__column-title' )
            .on( 'click', ( e ) => {
                this.dropdownActive( e, this );
            });
    }

    dropdownActive( e, $this ) {
        e.preventDefault();

        $this.parent = $( e.target.closest( '.two-columns__column-content--closest' ) );
        $this.optionsContainer = this.parent.find( '.two-columns__column-description' );
        $this.optionsContainerLine = this.parent.find( '.two-columns__line--vertical' );
        $( '.two-columns__line--vertical' ).removeClass( 'two-columns__line--vertical--hide' );

        if ( this.optionsContainer.hasClass( 'two-columns__column-description--show' ) ) {
            this.optionsContainer.removeClass( 'two-columns__column-description--show' );
        } else {
            $( '.two-columns__column-description' ).removeClass( 'two-columns__column-description--show' );
            this.optionsContainer.addClass( 'two-columns__column-description--show' );
            this.optionsContainerLine.addClass( 'two-columns__line--vertical--hide' );
        }
    }
}

new Dropdown();
