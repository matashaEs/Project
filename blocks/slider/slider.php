<?php
/**
 *  $slider [ $image ] ]
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}
?>

<section class="container-fluid slider">
	<div class="container slider__container">
		<?php if ( ! empty( $slider ) ) : ?>
			<?php foreach ( $slider as $slider_item ) : ?>
                <div class="slider__item">
                    <img src="<?= esc_url( $slider_item['image']['sizes']['full_hd'] );?>"
                    alt="CAI" class="slider__image">
                </div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>
