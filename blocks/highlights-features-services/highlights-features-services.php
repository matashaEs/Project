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

$style = ! empty( $color_pallet ) ? ' highlights--' . $color_pallet : '';

?>

<?php if ( ! empty( $contents ) ) : ?>
	<section class="container-fluid highlights<?= esc_html( $style ) ?>">
		<div class="container highlights__container">
			<div class="row highlights__row">
				<?php if ( ! empty( $title ) ) : ?>
					<div class="h2 highlights__title"><?= esc_html( $title ) ?></div>
				<?php endif; ?>
			</div>
			<div class="row highlights__row highlights__row-content">
				<?php foreach ( $contents as $content ) : ?>
					<div class="highlights__item">
						<?php if ( ! empty( $content['title'] ) ) : ?>
							<h4 class="highlights__item-title"><?= esc_html( $content['title'] ); ?></h4>
						<?php endif; ?>
						<?php if ( ! empty( $content['description'] ) ) : ?>
							<p class="highlights__item-description"><?= esc_html( $content['description'] ); ?></p>
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
