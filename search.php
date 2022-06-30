<?php
get_header();
?>
    <h1><?= __( 'Search page', 'nuplo' ); ?></h1>
    <strong><?= __( 'Search for: ', 'nuplo' ); ?></strong>
<?php
echo get_search_query();
?>
    <br>
    <br>
    <br>
    <div>
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/archive', 'content-row' );
		}
		echo get_template_part( 'template-parts/pagination', 'infinite-scroll' );
		?>
    </div>
<?php
get_footer();
