<?php
get_header();

$data_to_display = [
	'title'        => get_the_title(),
	'sidebar'      => [
		'mobileName' => __( 'Quick Links', 'nuplo' ),
		'blocks'     => [
			'selects'    => [
				[
					'title'          => 'Modules',
					'name'           => 'modules',
					'options'        => [
						[
							'id'    => 'millworkSolutions',
							'value' => 'Millwork Solutions',
						],
						[
							'id'    => 'LBMSoftware',
							'value' => 'LBM Software',
						],
						[
							'id'    => 'lumberProcessing',
							'value' => 'Lumber Processing',
						],
					],
					'button_classes' => 'button button--off-white',
				],
			],
			'navigation' => [
				'navigation_links' => apply_filters( 'cai_get_product_page_menu', get_the_ID() ),
			],
		],
	],
	'breadcrumbs'  => [
		[
			'name' => __( 'Home', 'nuplo' ),
			'url'  => get_home_url(),
		],
		// todo: category name should be dynamic.
		[
			'name' => 'ERP',
			'url'  => 'CATEGORY LINK',
		],
		[
			'name' => get_the_title(),
			'url'  => '#',
		],
	],
	'content_type' => 'the_content',
];

get_template_part( 'template-parts/sidebar-and-content', null, $data_to_display );

get_footer();
