<?php
/**
 * $title
 * $sidebar
 * $breadcrumbs
 *  $mobileName ( name of sidebar on mobile )
 *  $blocks ( 'radio-group' 'selects', 'navigation'; each block corresponds to a template part  )
 *      $items (( required ))
 * $content_type
 */

extract( $args );

$container_class   = 'the_content' === $content_type ? ' sidebar-and-content__container--the-content' : '';
$content_col_class = 'the_content' === $content_type ? ' sidebar-and-content__col-content--the-content' : '';

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
				'container_classes' => [ 'col', 'sidebar-and-content__col', 'sidebar-and-content__col-sidebar' ],
				'breadcrumbs'       => $breadcrumbs,
				'sidebar'           => $sidebar,
				'title'             => $title,
				'content_type'      => $content_type,
			]
		);
		?>
		<!-- Sidebar end -->


		<!-- Items list start -->
		<div class="col sidebar-and-content__col sidebar-and-content__col-content<?= esc_attr( $content_col_class ) ?>">
			<?php if ( ! empty( $title ) ) : ?>
				<h1 class="sidebar-and-content__title sidebar-and-content__title--mobile <?= is_single() ? 'sidebar-and-content__title--single' : '' ?>">
					<?= esc_html( $title ) ?>
				</h1>
			<?php endif; ?>

			<?php if ( 'items' === $content_type ) : ?>
				<div class="sidebar-and-content__content-container">
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
				<div class="sidebar-and-content__content-container">
					<?php the_content(); ?>
				</div>
			<?php endif; ?>
		</div>
		<!-- Items list end -->
	</div>
</section>
