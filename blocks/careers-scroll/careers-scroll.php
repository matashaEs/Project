<?php
/**
 * $title
 * $description
 * $link
 * $background_color [ select: 'default', 'modular--white', 'modular--off-white' ]
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

$careers = apply_filters( 'cai_get_all_job_offers', null );

?>

<section class="container-fluid careers-scroll modular<?= ! empty( $background_color ) ? ' ' . esc_html( $background_color ) : '' ?>">
	<div class="container careers-scroll__container">
		<div class="row careers-scroll__row careers-scroll__row-text">
			<?php if ( ! empty( $title ) ) : ?>
				<div class="h2 careers-scroll__title"><?= esc_html( $title ) ?></div>
			<?php endif; ?>
			<?php if ( ! empty( $description ) ) : ?>
				<div class="p careers-scroll__description"><?= esc_html( $description ) ?></div>
			<?php endif; ?>
			<?php if ( ! empty( $link ) ) : ?>
				<div class="row careers-scroll__row careers-scroll__row-button">
					<a href="<?= esc_url( $link['url'] ) ?>" class="button p careers-scroll__button">
						<?= esc_html( $link['title'] ) ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
		<div class="row careers-scroll__row careers-scroll__row-content">
			<?php if ( ! empty( $link ) ) : ?>
				<?php foreach ( $careers as $career ) : ?>
					<?php if ( ! empty( $career ) ) : ?>
						<div class="careers-scroll__item modular__item--mobile">
							<?php if ( ! empty( $career['name'] ) ) : ?>
								<div class="careers-scroll__item-title"><?= esc_html( $career['name'] ); ?></div>
							<?php endif; ?>
							<?php if ( ! empty( $career['description'] ) ) : ?>
								<div class="careers-scroll__item-description"><?= esc_html( $career['description'] ); ?></div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php else : ?>
				<?= esc_html( __( 'Sorry, no job offers for now', 'nuplo' ) ) ?>
			<?php endif; ?>
		</div>
	</div>
</section>
