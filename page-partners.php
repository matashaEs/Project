<?php
/** Template Name: Partners Page */
$partners = apply_filters( 'cai_get_list_of_partners', null );

get_header();

?>

	<div class="container-fluid">
		<div class="container page-partners">
			<?php
			echo esc_html( get_template_part( 'template-parts/breadcrumbs' ) );
			?>
			<h1><?php the_title(); ?></h1>

			<?php
			if ( ! empty( $partners ) ) {
				?>
				<div class="page-partners__list">
					<?php
					foreach ( $partners as $partner ) :
						if ( ! empty( $partner ) ) {
							?>
							<div class="page-partners__item">
								<a class="page-partners__link" href="<?= esc_url( $partner['url'] ) ?>">
									<?= esc_html( $partner['name'] ) ?>
								</a>
							</div>
							<?php
						}
					endforeach;
					?>
				</div>
				<div class="page-partners__download">
					<a href="<?= esc_url( get_permalink() . 'download' ); ?>" class="button">
						<?= esc_html( __( 'Download', 'nuplo' ) ); ?>
					</a>
				</div>
				<?php
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
