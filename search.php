<?php
get_header();

$terms = null;

if ( get_query_var( 's' ) ) {
	$terms['category'] = get_query_var( 'category' );
}

if ( get_query_var( 'category' ) ) {
	$terms['category'] = get_query_var( 'category' );
}

if ( get_query_var( 'industry' ) ) {
	$terms['industry'] = get_query_var( 'industry' );
}

$data_to_display = [
	'title'        => __( 'Search Results for ' . get_search_query(), 'nuplo' ),
	'sidebar'      => [
		'mobileName' => __( 'Search Results for [term]', 'nuplo' ),
		'blocks'     => [
			'navigation' => [
				[
					'block_id'   => 'products',
					'name' => "Products",
				],
				[
					'block_id'   => 'categories',
					'name' => "Categories",
				],
				[
					'block_id'   => 'resources',
					'name' => "Resources",
				],
				[
					'block_id'   => 'other',
					'name' => "Other",
				],
			],
		],
	],
	'content_type' => 'the_content',
];

get_template_part( 'template-parts/sidebar-and-content', null, $data_to_display );
?>
    <!--	<h1>--><?//= esc_html( __( 'Search page', 'nuplo' ) ); ?><!--</h1>-->
    <!--	<strong>--><?//= esc_html( __( 'Search for: ', 'nuplo' ) ); ?><!--</strong>-->
<?php
//echo get_search_query();
//?>
    <!--	<br>-->
    <!--	<br>-->
    <!--	<br>-->
    <!--	<div>-->
    <!--		--><?php
//		while ( have_posts() ) {
//			the_post();
//            the_title();
////			echo esc_html( get_template_part( 'template-parts/archive', 'content-row' ) );
//		}
//
//		echo esc_html( get_template_part( 'template-parts/pagination', 'infinite-scroll' ) );
//		?>
    <!--	</div>-->
<?php
get_footer();
