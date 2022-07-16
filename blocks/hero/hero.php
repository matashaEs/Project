<?php
/**
 *  $title
 *  $background_image_mobile
 *  $background_image
 *  $button
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}
?>

<section class="container-fluid hero">
	<div class="hero__image">
		<img src="<?= esc_url( $background_image_mobile['sizes']['full_hd'] ); ?>"
		class="hero__image-mobile">
	</div>
	<div class="hero__bg"
	style="background-image: url('<?= esc_url( $background_image['sizes']['full_hd'] ); ?>')"></div>
	<div class="container">
		<div class="hero__content">
			<?php if ( ! empty( $title ) ) : ?>
				<div class="hero__title">
					<?= esc_html( $title ) ?>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $button ) ) : ?>
				<?php $button_title = $button['title']; ?>
				<?php $button_url = $button['url']; ?>
				<?php $button_target = $button['target']; ?>

				<div class="hero__button">
					<a
					href="<?= esc_url( $button_url ); ?>"
					class="button hero__button-link"
					target=" <?= esc_attr( $button_target ) ?>">
						<?= esc_html( $button_title ) ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
