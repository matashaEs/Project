import $ from 'jquery';
import {Form} from './form';

class CustomerSupportPage {
    hubspotFormBaseSelector = '.customer-support-form .hbspt-form ';
    form = new Form();

    constructor() {
        this.waitForElm( this.hubspotFormBaseSelector + 'input[name=product]' ).then( ( hubspotProductInput ) => {
            const newSelect = this.buildSelect();
            $( hubspotProductInput ).parent().append( newSelect );

            this.addSelectListeners( this );

            this.errorClassListener( hubspotProductInput );
        });
    }

    /**
     * Promise that waits for appearing of element from string selector
     *
     * @param selector the element we are waiting for
     * @returns {Promise<unknown>}
     */
    waitForElm( selector ) {
        return new Promise( resolve => {
            if ( document.querySelector( selector ) ) {
                return resolve( document.querySelector( selector ) );
            }

            const observer = new MutationObserver( mutations => {
                if ( document.querySelector( selector ) ) {
                    resolve( document.querySelector( selector ) );
                    observer.disconnect();
                }
            });

            observer.observe( document.body, {
                childList: true,
                subtree: true
            });
        });
    }

    /**
     * builds selector from same to template part foem-select.php from product names
     * @returns {string} html with select.
     */
    buildSelect() {
        let newSelect = '<div class="select select--form select--customer-support">' +
            '                <div class="select__box">' +
            '                    <div class="select__options">';

        $.each( websiteData.productNames, function( key, productName ) {
            newSelect += '<div class="select__option radio__container">' +
                '                <div>' +
                '                    <input type="radio" class="input__radio input__radio--filters"' +
                '                            id="' + productName + '"' +
                '                            value="' + productName + '"/>' +
                '                </div>' +
                '                <label for="' + productName + '" class="p">' + productName + '</label>' +
                '            </div>';
        });

        newSelect += '</div>' +
            '        <div class="select__selected">' +
            '            <div class="select__selected-text">Product</div>' +
            '            <div class="select__arrow"></div>' +
            '        </div>' +

            '        <input type="hidden" class="input" placeholder="Product">' +
            '    </div>' +
            '</div>';

        return newSelect;
    }

    /**
     * add listeners to new select
     */
    addSelectListeners() {
        $( this.hubspotFormBaseSelector + '.select__box .select__selected' )
            .on( 'click', ( e ) => {
                this.form.selectFeature( e );
            });

        $( this.hubspotFormBaseSelector + '.select div.select__option' )
            .on( 'click', ( e ) => {
                this.form.optionFeature( e );
            });

        $( this.hubspotFormBaseSelector + '.select input[type="hidden"]' )
            .on( 'change', ( e ) => {
                const selectHiddenInput = $( e.target );
                selectHiddenInput.closest( '.select' ).prev().prop( 'value', selectHiddenInput.val() ).focus();
            });

        $( this.hubspotFormBaseSelector + 'form' )
            .on( 'submit', ( e ) => {
                document.body.scrollTop = document.documentElement.scrollTop = 0;
            });
    }


    errorClassListener( hubspotProductInput ) {

        /**
         * jQuery extension method that listens to class change.
         * @param cb
         * @returns {*|jQuery}
         */
        $.fn.classChange = function( cb ) {
            return $( this ).each( ( _, el ) => {
                new MutationObserver( mutations => {
                    mutations.forEach( mutation => cb && cb( mutation.target, $( mutation.target ).prop( mutation.attributeName ) ) );
                }).observe( el, {
                    attributes: true,
                    attributeFilter: [ 'class' ]
                });
            });
        };

        /**
         * Toggle class to new select depending on HubSpot product field classes.
         */
        $( hubspotProductInput ).classChange( ( el, newClass ) => {
            if ( -1 !== newClass.search( 'error' ) ) {
                $( this.hubspotFormBaseSelector + '.select' ).addClass( 'select--error' );
            } else {
                $( this.hubspotFormBaseSelector + '.select' ).removeClass( 'select--error' );
            }
        });
    }
}

new CustomerSupportPage();
