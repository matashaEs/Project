<?php
/**
 * $container_class
 * $title
 * $sidebar
 *  $mobileName ( name of sidebar on mobile )
 *  $blocks ( 'radio-group' 'selects', 'navigation'; each block corresponds to a template part  )
 *      $items (( required ))
 */

if ( ! empty( $args ) ) {
	extract( $args );
}

?>

<div class="quick-links <?= ! empty( $container_class ) ? esc_html( $container_class ) : ''?>">

	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

	<?php if ( ! empty( $title ) ) : ?>
		<h1 class="quick-links__title"><?= esc_html( $title ) ?></h1>
	<?php endif; ?>

	<?php if ( ! empty( $sidebar ) ) : ?>
		<div class="h3 quick-links__open-button">
			<?= esc_html( $sidebar['mobileName'] ) ?>
		</div>

		<div class="quick-links__container">
			<div class="quick-links__groups">
				<?php foreach ( $sidebar['blocks'] as $block_type => $block ) : ?>
					<?php if ( ! empty( $block ) ) : ?>

						<div class="quick-links__group">
							<?php if ( 'selects' == $block_type ) : ?>
								<?php foreach ( $block as $select ) : ?>
									<?php if ( ! empty( $select ) ) : ?>
										<?php get_template_part( 'template-parts/form-select', null, $select ); ?>
									<?php endif; ?>
								<?php endforeach; ?>

							<?php elseif ( 'radio-group' == $block_type ) : ?>
								<div class="quick-links__radio-group">
									<div class="h4 quick-links__radio-subtitle"><?= esc_html( $block['title'] ) ?></div>
									<?php get_template_part( 'template-parts/form-radio-group', null, $block ); ?>
								</div>

							<?php elseif ( 'form' == $block_type ) : ?>
								<?php get_template_part( 'template-parts/form', null, $block ); ?>

							<?php elseif ( 'navigation' == $block_type ) : ?>
								<?php get_template_part( 'template-parts/page-navigation', null, $block ); ?>

							<?php elseif ( 'links' == $block_type ) : ?>
								<?php get_template_part( 'template-parts/seo-posts-sidebar', null, $block ); ?>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
</div>
