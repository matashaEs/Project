<?php
/**
 * $title ( page title )
 * $browse_by ( for testing )
 * $sidebar
 *  $mobileName ( name of sidebar on mobile )
 *  $blocks ( 'radio-group' 'selects', 'navigation'; each block corresponds to a template part  )
 *      $items (( required ))
 *      $containerClasses (( optional ))
 */

$browse_by = '';

extract( $args );

if ( 'industry' === $browse_by ) {
	$list_title = __( 'Browse by Industry', 'nuplo' );
	$items      = apply_filters( 'cai_get_industries', null );
} elseif ( 'products' === $browse_by ) {
	$list_title = __( 'Browse by Product', 'nuplo' );
	$items      = apply_filters( 'cai_get_products', null );
}

$content_col_class = ! empty( $content_top_padding ) ? ' sidebar-and-content__col-content--padding-top-0' : '';

?>

<section class="container-fluid sidebar-and-content">
	<div class="container sidebar-and-content__container">

		<div class="col sidebar-and-content__col sidebar-and-content__col-sidebar">

			<div class="sidebar-and-content__sidebar-bg"></div>
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

							<?php $container_class = ! empty( $block['containerClasses'] ) ? $block['containerClasses'] : ''; ?>
							<div class="sidebar-and-content__sidebar-group <?= esc_html( $container_class ) ?>">
								<?php if ( 'selects' == $block_type ) : ?>
									<?php foreach ( $block['items'] as $select ) : ?>
										<?php get_template_part( 'template-parts/form-select', null, $select ); ?>
									<?php endforeach; ?>

								<?php elseif ( 'radio-group' == $block_type ) : ?>
									<h4 class="sidebar-and-content__sidebar-subtitle">
										<?= esc_html( $block['items']['title'] ) ?>
									</h4>
									<?php get_template_part( 'template-parts/form-radio-group', null, $block['items'] ); ?>

								<?php elseif ( 'form' == $block_type ) : ?>
									<?php get_template_part( 'template-parts/form', null, $block['items'] ); ?>

								<?php elseif ( 'navigation' == $block_type ) : ?>
									<?php get_template_part( 'template-parts/page-navigation', null, $block['items'] ); ?>
								<?php endif; ?>
							</div>

						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>

		</div>

		<div class="col sidebar-and-content__col sidebar-and-content__col-content<?= esc_attr( $content_col_class ) ?>">
			<?php if ( ! empty( $title ) ) : ?>
				<h1 class="sidebar-and-content__title sidebar-and-content__title--mobile <?= is_single() ? 'sidebar-and-content__title--single' : '' ?>">
					<?= esc_html( $title ) ?>
				</h1>
			<?php endif; ?>
			<?php if ( ! empty( $items ) ) : ?>
				<div class="sidebar-and-content__content-container">
					<?php foreach ( $items as $item ) : ?>
						<div class="sidebar-and-content__item">
							<div class="sidebar-and-content__item-image-container">
								<?php if ( ! empty( $item ['category'] ) ) : ?>
									<div
											class="sidebar-and-content__item-image"
											style="background-image: url('<?= esc_html( $item['background'] ); ?>');">
									</div>
									<div class="button button--orange sidebar-and-content__item-category">
										<?= esc_html( $item ['category'] ) ?>
									</div>
								<?php endif; ?>
							</div>
							<?php if ( ! empty( $item ['name'] ) ) : ?>
								<div class="sidebar-and-content__item-title"><?= esc_html( $item ['name'] ) ?></div>
							<?php endif; ?>
							<?php if ( ! empty( $item ['tags'] ) ) : ?>
								<div class="sidebar-and-content__item-tags">
									<?= esc_html( implode( ', ', $item ['tags'] ) ); ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php else : ?>
				<div class="sidebar-and-content__content-container">
					<?php the_content(); ?>
					<section class="container-fluid benefits">
						<div class="benefits__bg"></div>
					</section>
				</div>
			<?php endif; ?>
		</div>

	</div>
</section>
