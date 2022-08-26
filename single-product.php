<?php
get_header();

$modules_items = [];
$form          = [];

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

if ( ! empty( get_field( 'demo_form_guid' ) ) ) {
	$form = [
		'form_id'       => get_field( 'demo_form_guid' ),
		'fields'        => [
			[
				'type'        => 'text',
				'name'        => 'firstname',
				'placeholder' => 'First Name',
				'classes'     => 'input--border-off-white',
			],
			[
				'type'        => 'text',
				'name'        => 'lastname',
				'placeholder' => 'Last Name',
				'classes'     => 'input--border-off-white',
			],
			[
				'type'        => 'email',
				'name'        => 'email',
				'placeholder' => 'Email',
				'classes'     => 'input--border-off-white',
			],
			[
				'type'        => 'text',
				'name'        => 'company',
				'placeholder' => 'Company Name',
				'classes'     => 'input--border-off-white',
			],
		],
		'button'        => [
			'value'   => 'Schedule A Demo',
			'classes' => 'p button__send-form',
		],
		'after_sending' => get_field( 'product_after_sending', 'options' ),
	];
}

$data_to_display = [
	'title'        => get_the_title(),
	'sidebar'      => [
		'mobileName' => __( 'Quick Links', 'nuplo' ),
		'blocks'     => [
			'selects'    => $modules_items,
			'navigation' => apply_filters( 'cai_get_product_page_menu', get_the_ID() ),
			'form'       => $form,
		],
	],
	'content_type' => 'the_content',
];

get_template_part( 'template-parts/sidebar-and-content', null, $data_to_display );

get_footer();
