<?php
/**
 * $title
 * $description
 * $link
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

/*
 * TODO replace with integration
*/
$careers = [
	[
		'title'       => 'Lorem Ipsum1',
		'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
	],
	[
		'title'       => 'Lorem Ipsum2',
		'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
	],
	[
		'title'       => 'Lorem Ipsum3',
		'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
	],
	[
		'title'       => 'Lorem Ipsum4',
		'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
	],
];

?>

<section class="container-fluid careers-scroll">
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
					<a href="<?= esc_url( $link['url'] ) ?>" class="button careers-scroll__button">
						<?= esc_html( $link['title'] ) ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
		<div class="row careers-scroll__row careers-scroll__row-content">
			<?php foreach ( $careers as $career ) : ?>
				<div class="careers-scroll__item">
					<?php if ( ! empty( $career['title'] ) ) : ?>
						<div class="careers-scroll__item-title"><?= esc_html( $career['title'] ); ?></div>
					<?php endif; ?>
					<?php if ( ! empty( $career['description'] ) ) : ?>
						<div class="careers-scroll__item-description"><?= esc_html( $career['description'] ); ?></div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
