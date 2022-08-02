<?php
/** Template Name: Partners Page */
$partners = apply_filters( 'cai_get_list_of_partners', null );

get_header();

?>

	<div class="container-fluid">
		<div class="container">
			<?php
			echo esc_html( get_template_part( 'template-parts/breadcrumbs' ) );
			?>
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
			} else {
				?>
				<h4>
					<?php _e( 'No partners found...', 'nuplo' ); ?>
				</h4>
				<?php
			}
			?>
		</div>
	</div>

<?php
get_footer();
