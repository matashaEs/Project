<?php
/**
 *  $title
 *  $video
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

?>

<section class="container-fluid video">
	<div class="container">
		<div class="video__content <?= 'product' == get_post_type() ? 'video__content--product' : '' ?>">
			<?php if ( ! empty( $video ) ) : ?>
				<?php
            // @codingStandardsIgnoreStart
            echo wp_video_shortcode( $video );
            // @codingStandardsIgnoreEnd
				?>
			<?php endif; ?>
			<?php if ( ! empty( $title ) ) : ?>
			<div class="video__title h4">
				<?= esc_html( $title )?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
