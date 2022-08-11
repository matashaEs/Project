<?php
get_header();

$data_to_display = [
	'title'        => get_the_title(),
	'sidebar'      => [
		'mobileName' => __( 'Quick Links', 'nuplo' ),
		'blocks'     => [
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

$product_modules = apply_filters( 'cai_get_product_page_modules', get_the_ID() );
if ( ! empty( $product_modules ) ) {
	$modules_items = [
		'selects' => [
			'title'          => __( 'Modules', 'nuplo' ),
			'name'           => 'modules',
			'options'        => $product_modules,
			'button_classes' => 'button button--off-white',
		],
	];

	array_unshift( $data_to_display['sidebar']['blocks'], $modules_items );
}

get_template_part( 'template-parts/sidebar-and-content', null, $data_to_display );

get_footer();
