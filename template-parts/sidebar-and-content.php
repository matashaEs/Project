<?php
/**
 * $title
 * $breadcrumbs
 * $sidebar
 *  $mobileName ( name of sidebar on mobile )
 *  $blocks ( 'radio-group' 'selects', 'navigation', 'links'; each block corresponds to a template part  )
 * $content_type
 */

extract( $args );

$container_class   = 'the_content' === $content_type ? ' sidebar-and-content__container--the-content' : '';
$content_col_class = 'the_content' === $content_type ? ' sidebar-and-content__content--the-content' : '';

?>

<section class="container-fluid sidebar-and-content">
	<div class="container sidebar-and-content__container<?= esc_html( $container_class ) ?>">

		<!-- Sidebar start -->
		<div class="sidebar-and-content__sidebar-bg"></div>

		<?php
		get_template_part(
			'template-parts/quick-links',
			null,
			[
				'container_class' => 'sidebar-and-content__sidebar',
				'title'           => $title,
				'sidebar'         => $sidebar,
			]
		);
		?>
		<!-- Sidebar end -->


		<!-- Items list start -->
		<div class="sidebar-and-content__content<?= esc_attr( $content_col_class ) ?>">
			<?php if ( ! empty( $title ) ) : ?>
				<h1 class="sidebar-and-content__title <?= is_single() ? 'sidebar-and-content__title--single' : '' ?>">
					<?= esc_html( $title ) ?>
				</h1>
			<?php endif; ?>

			<div class="sidebar-and-content__content-container">
				<?php if ( 'items' === $content_type ) : ?>
					<?php if ( ! empty( $items ) ) : ?>
						<?php
						foreach ( $items as $item ) :
							if ( ! empty( $item['background'] ) ) {
								$background = $item['background'];
							} else {
								$background = get_template_directory_uri() . '/assets/img/placeholder.jpg';
							}
							?>

							<a href="<?= esc_url( $item['url'] ); ?>" class="sidebar-and-content__item">
								<div class="sidebar-and-content__item-image-container">
									<div
											class="sidebar-and-content__item-image"
											style="background-image: url('<?= esc_html( $background ); ?>');">
									</div>
									<?php if ( ! empty( $item ['category'] ) ) : ?>
										<div
												class="button sidebar-and-content__item-category"
												style="background: <?= esc_html( $item['category']['color'] ); ?>; border-color: <?= esc_html( $item['category']['color'] ); ?>"
										>
											<?= esc_html( $item ['category']['name'] ) ?>
										</div>
									<?php endif; ?>
								</div>
								<?php if ( ! empty( $item ['name'] ) ) : ?>
									<div class="sidebar-and-content__item-title"><?= esc_html( $item ['name'] ) ?></div>
								<?php endif; ?>
								<?php if ( ! empty( $item ['excerpt'] ) ) : ?>
									<div class="sidebar-and-content__item-excerpt">
										<?= esc_html( $item ['excerpt'] ); ?>
									</div>
								<?php endif; ?>
							</a>
						<?php endforeach; ?>
					<?php else : ?>
						<h3>
							<?php _e( 'No products were found matching your filters...', 'nuplo' ); ?>
						</h3>
					<?php endif; ?>
				</div>

				<?php else : ?>
					<?php the_content(); ?>
				<?php endif; ?>
			</div>
		</div>
		<!-- Items list end -->
	</div>
</section>
