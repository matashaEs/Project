<?php
get_header();

$data_to_display = [
	'title'        => __( 'Products', 'nuplo' ),
	'sidebar'      => [
		'mobileName' => __( 'Filters', 'nuplo' ),
		'blocks'     => [
			'radio-group' => [
				'title'   => __( 'Product Category', 'nuplo' ),
				'name'    => 'productCategory',
				'options' => apply_filters( 'cai_get_products_category', null ),
			],
			'selects'     => [
				[
					'title'          => __( 'Industry', 'nuplo' ),
					'name'           => 'industry',
					'options'        => apply_filters( 'cai_get_industries', null ),
					'button_classes' => 'button button--off-white',
				],
				[
					'title'          => 'Industry Type',
					'name'           => 'industryType',
					'options'        => apply_filters( 'cai_get_industry_types', null ),
					'button_classes' => 'button button--off-white',
				],
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
			'name' => __( 'Products', 'nuplo' ),
			'url'  => '#',
		],
	],
	'content_type' => 'the_content',
];

get_template_part( 'template-parts/sidebar-and-content', null, $data_to_display );

get_footer();
