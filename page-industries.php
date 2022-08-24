<?php
get_header();

$data_to_display = [
	'title'        => __( 'Industry', 'nuplo' ),
	'sidebar'      => [
		'mobileName' => __( 'Filters', 'nuplo' ),
		'blocks'     => [
			'selects'     => [
				[
					'title'          => __( 'Industry', 'nuplo' ),
					'name'           => 'industry',
					'select_classes' => 'product-sort__industry',
					'options'        => apply_filters( 'cai_get_industries', null ),
					'button_classes' => 'button button--off-white',
				],
			],
			'radio-group' => [
				'title'   => __( 'Product Category', 'nuplo' ),
				'name'    => 'category',
				'classes' => 'product-sort__category',
				'options' => apply_filters( 'cai_get_products_category', null ),
			],
		],
	],
	'items'        => apply_filters( 'cai_get_filtered_products', null ),
	'breadcrumbs'  => [
		[
			'name' => __( 'Home', 'nuplo' ),
			'url'  => get_home_url(),
		],
		[
			'name' => __( 'Industry', 'nuplo' ),
			'url'  => '#',
		],
	],
	'content_type' => 'items',
];

get_template_part( 'template-parts/sidebar-and-content', null, $data_to_display );

get_footer();
