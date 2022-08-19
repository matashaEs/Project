<?php get_header(); ?>

<div class="container-fluid page-404">
	<div class="container">
		<div class="h1"><?= esc_html__( 'Error 404:', 'nuplo' ) ?></div>
		<div class="h2"><?= esc_html__( 'Page not found', 'nuplo' ) ?></div>
		<a href="<?= esc_url( get_home_url() ) ?>" class="button p">
			<?= esc_html__( 'Return Home', 'nuplo' ) ?>
		</a>
	</div>
</div>

<?php
get_footer();
