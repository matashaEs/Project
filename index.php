<?php
get_header();
?>

<?php the_content(); ?>

<?php
echo esc_html( get_template_part( 'template-parts/pagination', 'infinite-scroll' ) );
?>

    <h2> idi nah </h2>

<?php
get_footer();
