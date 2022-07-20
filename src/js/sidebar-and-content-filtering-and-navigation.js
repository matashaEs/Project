import $ from 'jquery';

/**
 * Filtering and navigation part of the sidebar and content
 * Left gray bar with navigation and content on the right side
 */
class SidebarAndContentFilteringAndNavigation {
    constructor() {
        $( 'input[name="productCategory"]' ).on( 'change', this.categoryChanged );
        $( 'input[name="industry"]' ).on( 'change', this.productIndustryChanged );
        $( 'input[name="industryType"]' ).on( 'change', this.industryTypeChanged );
    }

    // Items filtering start
    /**
     * TODO: Filter list of items by product category
     */
    categoryChanged( e ) {
        console.log( $( e.target ).val() );
        console.log( 'product category' );
    }

    /**
     * TODO: Filter list of items by product industry
     */
    productIndustryChanged( e ) {
        console.log( 'product industry' );
        console.log( $( e.target ).val() );
    }

    /**
     * TODO: Filter list of items by industry type
     */
    industryTypeChanged( e ) {
        console.log( 'industry type' );
        console.log( $( e.target ).val() );
    }

    // Items filtering end

    // Product navigation start
    /**
     * TODO: navigation for the product page
     */
    // Product navigation end
}

new SidebarAndContentFilteringAndNavigation();
