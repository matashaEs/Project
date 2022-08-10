<?php

if ( ! empty( $args ) ) {
	extract( $args );
}

?>

<div class="quick-links <?= ! empty( $container_classes ) ? esc_html( implode( ' ', $container_classes ) ) : ''?>">

	<?php get_template_part( 'template-parts/breadcrumbs', null, $breadcrumbs ?? null ); ?>
	<?php if ( ! empty( $title ) ) : ?>
		<h1 class="quick-links__title">
			<?= esc_html( $title ) ?>
		</h1>
	<?php endif; ?>

	<?php if ( ! empty( $sidebar ) ) : ?>
		<div class="h3 quick-links__open-button">
			<?= esc_html( $sidebar['mobileName'] ) ?>
			<?php the_svg( 'down-arrow', 'quick-links__open-button-arrow' ); ?>
		</div>

		<div class="quick-links__container">
			<div class="quick-links__groups">
				<?php foreach ( $sidebar['blocks'] as $block_type => $block ) : ?>

					<div class="quick-links__group <?= esc_html( $container_class ) ?>">
						<?php if ( 'selects' == $block_type ) : ?>
							<?php foreach ( $block as $select ) : ?>
								<?php get_template_part( 'template-parts/form-select', null, $select ); ?>
							<?php endforeach; ?>

						<?php elseif ( 'radio-group' == $block_type ) : ?>
							<h4 class="quick-links__radio-subtitle">
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
