<?php
get_header();

$category         = get_category( get_query_var( 'cat' ) );
$category_id      = $category->cat_ID;
$category_page_id = get_field( 'product_category_page', 'category_' . $category_id );

if ( ! empty( $category_page_id ) ) :

	$query = new WP_Query( [ 'page_id' => $category_page_id ] );
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) :
			$query->the_post();
			?>

		<div class="product-category">
			<?php the_content(); ?>
		</div>
			<?php
		endwhile;
		wp_reset_postdata();
	endif;

endif;

get_footer();
