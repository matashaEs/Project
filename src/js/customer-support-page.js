// import $ from 'jquery';
//
// class CustomerSupportPage {
//     constructor() {
//
//         this.waitForElm( '.customer-support-form .hbspt-form .submitted-message' ).then( ( hubspotSubmittedMessage ) => {
//             $( hubspotSubmittedMessage ).closest( '.customer-support-form' ).find( '.select' ).remove();
//         });
//     }
//
//     /**
//      * Promise that waits for appearing of element from string selector
//      *
//      * @param selector the element we are waiting for
//      * @returns {Promise<unknown>}
//      */
//     waitForElm( selector ) {
//         return new Promise( resolve => {
//             if ( document.querySelector( selector ) ) {
//                 return resolve( document.querySelector( selector ) );
//             }
//
//             const observer = new MutationObserver( mutations => {
//                 if ( document.querySelector( selector ) ) {
//                     resolve( document.querySelector( selector ) );
//                     observer.disconnect();
//                 }
//             });
//
//             observer.observe( document.body, {
//                 childList: true,
//                 subtree: true
//             });
//         });
//     }
// }
//
// new CustomerSupportPage();
