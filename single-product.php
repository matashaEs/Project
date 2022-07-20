<?php
get_header();

$data_to_display = [
	'title'               => get_the_title(),
	'content_top_padding' => false,
	'sidebar'             => [
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
				'navigation_links' => [
					[
						'title' => 'Integrations',
						'link'  => 'https://google.com',
					],
					[
						'title' => 'FAQs',
						'link'  => 'https://google.com',
					],
					[
						'title' => 'Testimonials',
						'link'  => 'https://google.com',
					],
					[
						'title' => 'Contact Us',
						'link'  => 'https://google.com',
					],
				],
			],
		],
	],
	// todo: it should be dynamic. It is also missing on designs.
	'breadcrumbs'        => [
		[
			'name' => 'Home',
			'url'  => get_permalink(),
		],
		[
			'name' => 'ERP',
			'url'  => get_permalink(),
		],
		[
			'name' => get_the_title(),
			'url'  => get_permalink(),
		],
	],
	'content_type'        => 'the_content',
];

get_template_part( 'template-parts/sidebar-and-content', null, $data_to_display );

get_footer();
