<?php
/**
 *  $title
 *  $video
 *  $fullscreen
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

?>

<section class="container-fluid video">
	<div class="container <?= 1 == $fullscreen ? 'video__container--fullscreen' : ''?>">
		<div class="video__content">
			<?php if ( ! empty( $video ) ) : ?>
				<video class="video__display" autoplay controls loop muted playsinline>
					<source src="<?= esc_url( $video['url'] )?> ">
				</video>
			<?php endif; ?>
			<?php if ( ! empty( $title ) ) : ?>
				<div class="video__title h4">
					<?= esc_html( $title ) ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
