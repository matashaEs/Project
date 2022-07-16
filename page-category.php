<?php
get_header();
$list_title = __( 'Browse by Product', 'nuplo' );


$pages_data = apply_filters( 'cai_get_sidebar_and_content_data', null );
get_template_part( 'template-parts/sidebar-and-content', null, $pages_data[0] );
?>
<?php the_content(); ?>
	<h1>Industry</h1>
<?php
get_footer();
