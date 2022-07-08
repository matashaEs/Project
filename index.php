<?php
get_header();
?>

<?php the_content(); ?>

<?php
echo esc_html( get_template_part( 'template-parts/pagination', 'infinite-scroll' ) );
?>

<button>Button usual</button>
<button class="button--footer">Button footer</button>
<button class="button--white">Button white</button>
<button class="button--white button--white-blue">Button white blue</button>
<button class="button--blue-border">Button blue border</button>
<button class="button--orange">Button orange</button>
<button class="button--dark-pink">Button dark pink</button>
<button class="button--light-pink">Button light pink</button>
<button class="button--wms">Button WMS</button>
<?php
get_footer();
