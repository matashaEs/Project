import $ from 'jquery';

/**
 * Filtering and navigation part of the sidebar and content
 * Left gray bar with navigation and content on the right side
 */
class SidebarAndContentFilteringAndNavigation {
    constructor() {
        $( 'input[name="productCategory"]' ).on( 'change', this.categoryChanged );
        $( 'input[name="industry"]' ).on( 'change', this.productIndustryChanged );
        $( 'input[name="industry-type"]' ).on( 'change', this.industryTypeChanged );
    }

    // Items filtering start
    /**
     * Filter list of items by product category
     */
    categoryChanged( e ) {
        console.log( 'product category' );
    }

    /**
     * Filter list of items by product industry
     */
    productIndustryChanged( e ) {
        console.log( 'product industry' );

        // console.log( option.find( 'input' ).val() );
    }

    /**
     * Filter list of items by industry type
     */
    industryTypeChanged( e ) {
        console.log( 'industry type' );
    }

    // Items filtering end

    // Product navigation start
    // Product navigation end
}

new SidebarAndContentFilteringAndNavigation();
