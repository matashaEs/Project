<?php /** Template Name: Partners Page */
$partners = apply_filters( 'get_partners_list', null );

get_header();

?>

<div class="container-fluid">
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<?php

		if ( ! empty( $partners ) ) {
			foreach ( $partners as $partner ) {
				if ( ! empty( $partner ) ) {
					?>
					<a href="<?= esc_url( $partner['url'] ) ?>"><?= esc_html( $partner['name'] ) ?></a>
					<?php
				}
			}
		}
		?>
	</div>
</div>

<?php
get_footer();
