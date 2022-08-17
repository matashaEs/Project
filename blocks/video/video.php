<?php
/**
 *  $title
 *  $video
 *  $fullscreen
 *  $background_color [ select: 'default', 'modular--white', 'modular--off-white' ]
 *  $add_vimeo_video
 *  $video_vimeo
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

$fluid_classes  = ! empty( $fullscreen ) ? ' video--fullscreen' : '';
$fluid_classes .= ! empty( $background_color ) ? ' ' . esc_html( $background_color ) : '';

?>

<section class="container-fluid video modular<?= esc_html( $fluid_classes ) ?>">
	<div class="container video__container <?= ! empty( $fullscreen ) ? ' video__container--fullscreen' : ''?>">
		<div class="video__content ">
			<?php if ( 1 == $add_vimeo_video ) : ?>
				<?php
				if ( ! empty( $video_vimeo ) ) :
                    // @codingStandardsIgnoreStart
					echo $video_vimeo;
                    // @codingStandardsIgnoreEnd
				endif;
				?>
			<?php else : ?>
				<?php if ( ! empty( $video ) ) : ?>
					<video class="video__display" autoplay controls loop muted playsinline>
						<source src="<?= esc_url( $video['url'] )?> ">
					</video>
				<?php endif; ?>
			<?php endif; ?>
			<?php if ( ! empty( $title ) ) : ?>
				<div class="video__title h4 modular__item--transparent">
					<?= esc_html( $title )?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
