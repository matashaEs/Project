<?php
get_header();

$modules_items = [];
$form_info     = [];

$product_form_information = get_field( 'product_detail_form_information', 'options' );

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

if ( ! empty( $product_form_information && $product_form_information['form_shortcode'] ) ) {
	foreach ( explode( ' ', trim( $product_form_information['form_shortcode'], '[]' ) ) as $field ) {
		$field_array                  = explode( '=', $field );
		$form_info[ $field_array[0] ] = $field_array[1] ?? '';
	}
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
				'portal'        => $form_info['portal'] ?? '',
				'form_id'       => $form_info['id'] ?? '',
				'fields'        => [
					[
						'type'        => 'text',
						'name'        => 'firstname',
						'placeholder' => 'First Name',
					],
					[
						'type'        => 'text',
						'name'        => 'lastname',
						'placeholder' => 'Last Name',
					],
					[
						'type'        => 'email',
						'name'        => 'email',
						'placeholder' => 'Email',
					],
					[
						'type'        => 'text',
						'name'        => 'company',
						'placeholder' => 'Company Name',
					],
				],
				'button'        => [
					'value'   => 'Schedule A Demo',
					'classes' => 'p button__send-form',
				],
				'after_sending' => $product_form_information['after_sending_form_content'],
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
