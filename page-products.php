<?php
get_header();

$terms = null;

if ( get_query_var( 'category' ) ) {
	$terms['category'] = get_query_var( 'category' );
}

if ( get_query_var( 'industry' ) ) {
	$terms['industry'] = get_query_var( 'industry' );
}

$data_to_display = [
	'title'        => __( 'Products', 'nuplo' ),
	'sidebar'      => [
		'mobileName' => __( 'Filters', 'nuplo' ),
		'blocks'     => [
			'radio-group' => [
				'title'   => __( 'Product Category', 'nuplo' ),
				'name'    => 'category',
				'classes' => 'product-sort__category',
				'options' => apply_filters( 'cai_get_products_category', false ),
			],
			'selects'     => [
				[
					'title'          => __( 'Industry', 'nuplo' ),
					'name'           => 'industry',
					'select_classes' => 'product-sort__industry',
					'options'        => apply_filters( 'cai_get_industries', null ),
					'button_classes' => 'button button--off-white',
					'expand_to_top'  => true,
				],
			],
		],
	],
	'items'        => apply_filters( 'cai_get_filtered_products', $terms ),
	'content_type' => 'items',
];

get_template_part( 'template-parts/sidebar-and-content', null, $data_to_display );

get_footer();
