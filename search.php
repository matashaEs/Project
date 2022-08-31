<?php
get_header();

$terms = null;

$data_to_display = [
	'title'        => __( 'Search Results for ' . get_search_query(), 'nuplo' ),
	'sidebar'      => [
		'mobileName' => __( 'Navigation', 'nuplo' ),
		'blocks'     => [
			'navigation' => [
				[
					'block_id' => 'products',
					'name'     => "Products",
				],
				[
					'block_id' => 'categories',
					'name'     => "Categories",
				],
				[
					'block_id' => 'resources',
					'name'     => "Resources",
				],
				[
					'block_id' => 'other',
					'name'     => "Other",
				],
			],
		],
	],
	'content_type' => 'the_content',
];

get_template_part( 'template-parts/sidebar-and-content', null, $data_to_display );
?>

<?php
get_footer();
