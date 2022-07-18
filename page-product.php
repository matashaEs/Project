<?php
/** Some issues to fix:
 * todo: sidebar doesn't work properly. To high without data. It should be sticked + scrolled.
 * todo: Add information if filtering is empty doesn't exist.
 * todo: hoist data to smaller template parts
 * todo: breadcrubs are missing
 */

get_header();

$product_categories  = apply_filters( 'cai_get_products_category', null );
$industry_categories = apply_filters( 'cai_get_industries', null );
$industry_types      = apply_filters( 'cai_get_industry_types', null );

$data_to_display = [
	'title'               => __( 'Products', 'nuplo' ),
	// todo: $content_top_padding - what is it???
	'content_top_padding' => true,
	'sidebar'             => [
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
					'name'           => 'industry-type',
					'options'        => apply_filters( 'cai_get_industry_types', null ),
					'button_classes' => 'button button--off-white',
				],
			],
		],
	],
	'items'               => apply_filters( 'cai_get_filtered_products', null ),
	// todo: it should be dynamic. It is also missing on designs.
	'bread_crumbs'        => [
		[
			'name' => 'Home',
			'url'  => get_permalink(),
		],
		[
			'name' => 'Products',
			'url'  => get_permalink(),
		],
	],
	'content_type'        => 'items', // todo: or 'the_content'.
];

get_template_part( 'template-parts/sidebar-and-content', null, $data_to_display );

get_footer();
