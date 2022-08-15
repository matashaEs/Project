<?php
/**
 * $columns
 *     $title
 *     $description
 *     $contents
 *         $title
 *         $description
 * $background_color [ select: 'default', 'modular--white', 'modular--off-white' ]
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

?>


<section
		class="container-fluid two-columns modular<?= ! empty( $background_color ) ? ' ' . esc_html( $background_color ) : '' ?>">
	<div class="container two-columns__container">
		<div class="two-columns__columns">
			<?php foreach ( $columns as $column ) : ?>
				<div class="two-columns__item-container two-columns__item-container--title">
					<?php if ( ! empty( $column['title'] ) ) : ?>
						<div class="h3 two-columns__columns-title"><?= esc_html( $column['title'] ) ?></div>
					<?php endif; ?>
				</div>
				<div class="two-columns__item-container two-columns__item-container--description">
					<?php if ( ! empty( $column['description'] ) ) : ?>
						<div class="p two-columns__columns-description"><?= esc_html( $column['description'] ) ?></div>
					<?php endif; ?>
				</div>
				<div class="two-columns__item-container two-columns__item-container--content">
					<?php if ( ! empty( $column['contents'] ) ) : ?>
						<div class="two-columns__column-content">
							<?php foreach ( $column['contents'] as $content ) : ?>
								<div class="two-columns__column-content--closest">
									<div class="p-large two-columns__column-title">
										<?php if ( ! empty( $content['title'] ) ) : ?>
											<?= esc_html( $content['title'] ) ?>
										<?php endif; ?>
										<?php if ( ! empty( $content['description'] ) ) : ?>
											<div class="two-columns__close">
												<div class="two-columns__line two-columns__line--vertical two-columns__line--vertical--show"></div>
												<div class="two-columns__line"></div>
											</div>
										<?php endif; ?>
									</div>
									<?php if ( ! empty( $content['description'] ) ) : ?>
										<div class="p two-columns__column-description"><?= esc_html( $content['description'] ) ?></div>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
