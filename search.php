<?php
get_header();

$terms = null;

if ( get_query_var( 's' ) ) {
	$terms['category'] = get_query_var( 'category' );
	echo "hello s";
}

if ( get_query_var( 'category' ) ) {
	$terms['category'] = get_query_var( 'category' );
    echo "hello c";
}

if ( get_query_var( 'industry' ) ) {
	$terms['industry'] = get_query_var( 'industry' );
	echo "hello i";
}

$data_to_display = [
	'title'        => __( 'Search Results for [term]', 'nuplo' ),
	'sidebar'      => [
		'mobileName' => __( 'Search Results for [term]', 'nuplo' ),
		'blocks'     => [
			'navigation' => apply_filters( 'cai_get_product_page_menu', get_the_ID() ),
//			'radio-group' => [
//				'title'   => __( 'Product Category', 'nuplo' ),
//				'name'    => 'category',
//				'classes' => 'product-sort__category',
//				'options' => apply_filters( 'cai_get_products_category', false ),
//			],
//			'selects'     => [
//				[
//					'title'          => __( 'Industry', 'nuplo' ),
//					'name'           => 'industry',
//					'select_classes' => 'product-sort__industry',
//					'options'        => apply_filters( 'cai_get_industries', null ),
//					'button_classes' => 'button button--off-white',
//					'expand_to_top'  => true,
//				],
//			],
		],
	],
//	'items'        => apply_filters( 'cai_get_filtered_news', null ),
	'content_type' => 'the_content',
];

get_template_part( 'template-parts/sidebar-and-content', null, $data_to_display );
?>
<!--	<h1>--><?//= esc_html( __( 'Search page', 'nuplo' ) ); ?><!--</h1>-->
<!--	<strong>--><?//= esc_html( __( 'Search for: ', 'nuplo' ) ); ?><!--</strong>-->
<?php
//echo get_search_query();
//?>
<!--	<br>-->
<!--	<br>-->
<!--	<br>-->
<!--	<div>-->
<!--		--><?php
//		while ( have_posts() ) {
//			the_post();
//            the_title();
////			echo esc_html( get_template_part( 'template-parts/archive', 'content-row' ) );
//		}
//
//		echo esc_html( get_template_part( 'template-parts/pagination', 'infinite-scroll' ) );
//		?>
<!--	</div>-->
<?php
get_footer();
