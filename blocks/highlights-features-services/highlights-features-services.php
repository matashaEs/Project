<?php
/**
 * $title
 * $contents
 * $color_pallet
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

?>

<?php if ( ! empty( $contents ) ) : ?>
	<section class="container-fluid modular highlights<?= ! empty( $background_color ) ? ' ' . esc_html( $background_color ) : ''?>">
		<div class="modular__bg"></div>
		<div class="container highlights__container">
			<div class="row highlights__row">
				<?php if ( ! empty( $title ) ) : ?>
					<div class="h2 highlights__title"><?= esc_html( $title ) ?></div>
				<?php endif; ?>
			</div>
			<div class="row highlights__row highlights__row-content">
				<?php foreach ( $contents as $content ) : ?>
					<div class="modular__item highlights__item">
						<?php if ( ! empty( $content['title'] ) ) : ?>
							<div class="highlights__item-title"><?= esc_html( $content['title'] ); ?></div>
						<?php endif; ?>
						<?php if ( ! empty( $content['description'] ) ) : ?>
							<div class="p highlights__item-description"><?= esc_html( $content['description'] ); ?></div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
			<?php if ( ! empty( $link ) ) : ?>
				<div class="row highlights__row highlights__row-button">
					<a href="<?= esc_url( $link['url'] ) ?>" class="button highlights__button">
						<?= esc_html( $link['title'] ) ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
