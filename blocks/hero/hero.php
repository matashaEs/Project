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
	<div class="hero__image hero__image-mobile"
	style="background-image: url('<?= esc_url( $background_image_mobile['sizes']['full_hd'] ); ?>')"></div>
	<div class="hero__bg"
	style="background-image: url('<?= esc_url( $background_image['sizes']['full_hd'] ); ?>')"></div>
	<div class="container hero__container">
		<?php if ( ! empty( $title ) ) : ?>
			<div class="h1 hero__title">
				<?= esc_html( $title ) ?>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $button ) ) : ?>
			<?php $button_title = $button['title']; ?>
			<?php $button_url = $button['url']; ?>
			<?php $button_target = $button['target']; ?>

			<a
			href="<?= esc_url( $button_url ); ?>"
			class="p button hero__button-link"
			target=" <?= esc_attr( $button_target ) ?>">
				<?= esc_html( $button_title ) ?>
			</a>
		<?php endif; ?>
	</div>
</section>
