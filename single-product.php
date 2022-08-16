<?php
get_header();

$modules_items   = [];
$product_modules = apply_filters( 'cai_get_product_page_modules', get_the_ID() );
if ( ! empty( $product_modules ) ) {
	$modules_items = [
		[
			'title'          => __( 'Modules', 'nuplo' ),
			'name'           => 'modules',
			'options'        => $product_modules,
			'button_classes' => 'button button--off-white',
		],
	];
}

$data_to_display = [
	'title'        => get_the_title(),
	'sidebar'      => [
		'mobileName' => __( 'Quick Links', 'nuplo' ),
		'blocks'     => [
			'selects'    => $modules_items,
			'navigation' => [
				'navigation_links' => apply_filters( 'cai_get_product_page_menu', get_the_ID() ),
			],
			'form'       => [
				'id'     => 'formId',
				'name'   => 'formName',
				'fields' => [
					[
						'type'        => 'text',
						'name'        => 'Name',
						'id'          => 'nameId',
						'placeholder' => 'Name',
					],
					[
						'type'        => 'email',
						'name'        => 'Email',
						'id'          => 'emailId',
						'placeholder' => 'Email',
					],
					[
						'type'        => 'telephone',
						'name'        => 'Phone',
						'id'          => 'phoneId',
						'placeholder' => 'Phone',
					],
				],
				'button' => [
					'name'    => 'buttonName',
					'id'      => 'buttonId',
					'value'   => 'Schedule A Demo',
					'classes' => 'p',
				],
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
