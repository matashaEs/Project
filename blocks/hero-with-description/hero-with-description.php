<?php
/**
 *  $title
 *  $description
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

<section class="container-fluid hwd">
	<div class="hwd__image">
		<img src="<?= esc_url( $background_image_mobile['sizes']['full_hd'] ); ?>"
			 class="hwd__image-mobile">
	</div>
	<div class="hwd__bg"
		 style="background-image: url('<?= esc_url( $background_image['sizes']['full_hd'] ); ?>')"></div>
	<div class="container">
		<div class="hwd__content">
			<div class="hwd__path p">
				Home > About
			</div>
			<?php if ( ! empty( $title ) ) : ?>
				<div class="hwd__title">
					<?= esc_html( $title ) ?>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $description ) ) : ?>
				<div class="hwd__description">
					<?= esc_html( $description ) ?>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $button ) ) : ?>
				<?php $button_title = $button['title']; ?>
				<?php $button_url = $button['url']; ?>
				<?php $button_target = $button['target']; ?>
				<?php if ( ! empty( $button_title ) && ! empty( $button_url ) ) : ?>
					<div class="hwd__button">
						<a
						 href="<?= esc_url( $button_url ); ?>"
						 class="button hwd__button-link p"
						 target=" <?= esc_attr( $button_target ) ?>">
							<?= esc_html( $button_title ) ?>
						</a>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
