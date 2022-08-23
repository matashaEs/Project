<?php
get_header();

$category    = get_category( get_query_var( 'cat' ) );
$this_cat_id = $category->cat_ID;
$cat_page_id = get_field( 'product_category_page', 'category_' . $this_cat_id );

$category_page = get_post( $cat_page_id );

$page_content = apply_filters( 'the_content', $category_page->post_content );

?>

<div class="product-category">
	<?php
    // @codingStandardsIgnoreStart
     echo $page_content
	// @codingStandardsIgnoreEnd
	?>
</div>

<?php
get_footer();
