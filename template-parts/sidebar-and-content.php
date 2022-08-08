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

$content_col_class = 'the_content' === $content_type ? ' sidebar-and-content__col-content--the-content' : '';

?>

<section class="container-fluid sidebar-and-content">
	<div class="container sidebar-and-content__container">

		<!-- Sidebar start -->
		<div class="sidebar-and-content__sidebar-bg"></div>

		<div class="col sidebar-and-content__col sidebar-and-content__col-sidebar">

			<?php
			get_template_part( 'template-parts/breadcrumbs', null, $breadcrumbs );
			?>
			<?php if ( ! empty( $title ) ) : ?>
				<h1 class="sidebar-and-content__title sidebar-and-content__title--desktop">
					<?= esc_html( $title ) ?>
				</h1>
			<?php endif; ?>

			<?php if ( ! empty( $sidebar ) ) : ?>
				<h3 class="sidebar-and-content__sidebar-title">
					<?= esc_html( $sidebar['mobileName'] ) ?>
					<?php the_svg( 'down-arrow', 'sidebar-and-content__sidebar-title-arrow' ); ?>
				</h3>

				<div class="sidebar-and-content__sidebar-container">
					<div class="sidebar-and-content__sidebar">
						<?php foreach ( $sidebar['blocks'] as $block_type => $block ) : ?>

							<?php $container_class = 'the_content' === $content_type ? 'mb0' : ''; ?>
							<div class="sidebar-and-content__sidebar-group <?= esc_html( $container_class ) ?>">
								<?php if ( 'selects' == $block_type ) : ?>
									<?php foreach ( $block as $select ) : ?>
										<?php get_template_part( 'template-parts/form-select', null, $select ); ?>
									<?php endforeach; ?>

								<?php elseif ( 'radio-group' == $block_type ) : ?>
									<h4 class="sidebar-and-content__sidebar-subtitle">
										<?= esc_html( $block['title'] ) ?>
									</h4>
									<?php get_template_part( 'template-parts/form-radio-group', null, $block ); ?>

								<?php elseif ( 'form' == $block_type ) : ?>
									<?php get_template_part( 'template-parts/form', null, $block ); ?>

								<?php elseif ( 'navigation' == $block_type ) : ?>
									<?php get_template_part( 'template-parts/page-navigation', null, $block ); ?>
								<?php endif; ?>
							</div>

						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
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
