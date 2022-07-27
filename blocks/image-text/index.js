import './image-text.scss';

import $ from 'jquery';

class ImageText {
    constructor() {
        $( '.image-text__title-section' )
            .on( 'click', ( e ) => {
                this.dropdownActive( e, this );
            });
    }

    dropdownActive( e, $this ) {
        e.preventDefault();

        $this.parent = $( e.target.closest( '.image-text__row' ) );
        $this.columnImage = this.parent.find( '.image-text__column-image' );
        $this.columnsWithButton = this.parent.find( '.image-text__columns-with-button' );
        $this.arrow = this.parent.find( '.image-text__arrow' );

        if ( ( this.columnImage.hasClass( 'image-text__column-image--show' ) ) || ( this.columnImage.hasClass( 'image-text__columns-with-button--show' ) ) ) {
            setTimeout( function() {
                $this.columnsWithButton.removeClass( 'image-text__columns-with-button--show' );
            }, 300, $this.columnsWithButton );
            this.columnImage.removeClass( 'image-text__column-image--show' );
            this.arrow.removeClass( 'image-text__arrow-rotate' );
        } else {
            setTimeout( function() {
                $this.columnImage.addClass( 'image-text__column-image--show' );
            }, 200, $this.columnImage );

            this.columnsWithButton.addClass( 'image-text__columns-with-button--show' );
            this.arrow.addClass( 'image-text__arrow-rotate' );
        }
    }
}

new ImageText();

