<?php
/**
 * $title
 * $description
 * $link
 * $options [ link,  image, description ]
 */

if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

?>

<section class="container-fluid options-wide modular <?= ! empty( $background_color ) ? ' ' . esc_html( $background_color ) : '' ?>">
	<div class="container">

		<div class="row options-wide__row options-wide__texts">
			<?php if ( ! empty( $title ) ) : ?>
				<div class="h2 options-wide__title"><?= esc_html( $title ); ?></div>
			<?php endif; ?>
			<?php if ( ! empty( $description ) ) : ?>
				<div class="p options-wide__description"><?= esc_html( $description ); ?></div>
			<?php endif; ?>
			<?php if ( ! empty( $link && $link['url'] && $link['title'] ) ) : ?>
				<a href="<?= esc_url( $link['url'] ) ?>" class="button options-wide__button">
					<?= esc_html( $link['title'] ); ?>
				</a>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $options ) ) : ?>
			<div class="row options-wide__row options-wide__options">
				<?php foreach ( $options as $option ) : ?>
					<div class="options-wide__option">
						<div class="options-wide__option-bg"
							style="background-image: url('<?= esc_html( $option['image']['sizes']['large'] ); ?>');"></div>
						<a href="<?= esc_url( $option['link']['url'] ); ?>"
							class="button button--white options-wide__option-button">
							<?= esc_html( $option['link']['title'] ); ?>
						</a>
						<div class="h4 options-wide__option-title"><?= esc_html( $option['link']['title'] ); ?></div>
						<div class="p options-wide__option-description"><?= esc_html( $option['description'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
