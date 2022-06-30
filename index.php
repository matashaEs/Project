<?php
get_header();
?>

<?php the_content(); ?>

<?php
echo get_template_part( 'template-parts/pagination', 'infinite-scroll' );
?>

<?php
get_footer();
