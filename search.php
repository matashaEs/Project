<?php
get_header();

$terms = null;

$search_results = apply_filters( 'cai_get_filtered_results', null );
$navigation     = [];
if ( ! empty( $search_results['products'] ) ) {
	$navigation[] = [
		'block_id' => 'products',
		'name'     => 'Products',
	];
}

if ( ! empty( $search_results['categories'] ) ) {
	$navigation[] = [
		'block_id' => 'categories',
		'name'     => 'Categories',
	];
}

if ( ! empty( $search_results['resources'] ) ) {
	$navigation[] = [
		'block_id' => 'resources',
		'name'     => 'Resources',
	];
}

if ( ! empty( $search_results['other'] ) ) {
	$navigation[] = [
		'block_id' => 'other',
		'name'     => 'Other',
	];
}

$data_to_display = [
	'title'          => __( 'Search Results for ', 'nuplo' ) . get_search_query(),
	'sidebar'        => [
		'mobileName' => __( 'Navigation', 'nuplo' ),
		'blocks'     => [
			'navigation' => $navigation,
		],
	],
	'content_type'   => 'search_results',
	'search_results' => $search_results,
];

get_template_part( 'template-parts/sidebar-and-content', null, $data_to_display );
?>

<?php
get_footer();
