<?php

if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

$class_reverse = ( 'reverse' === $direction ) ? 'image-text__reverse' : '';
$class_color   = ( true === $add_background ) ? 'image-text__background' : '';

?>

<section class="container-fluid image-text <?= esc_html( $class_color ) ?>">
	<div class="container">
		<div class="row image-text__row <?= esc_html( $class_reverse ) ?>">
			<div class="image-text__column-image">
				<?php if ( ! empty( $image ) ) : ?>
					<div class="image-text__image"
						style="background-image: url('<?= esc_url( $image['sizes']['large'] ); ?>')"></div>
				<?php endif; ?>
			</div>
			<div class="image-text__column-content">
				<?php if ( ! empty( $title ) ) : ?>
					<div class="image-text__title h2"><?= esc_html( $title ) ?></div>
				<?php endif; ?>
				<div class="image-text__columns">
					<?php if ( ! empty( $description ) ) : ?>
						<?php foreach ( $description as $content ) : ?>
							<div class="image-text__column">
								<?= wp_kses( $content['column'], [ 'p' => [ '' ] ] ) ?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $link['url'] && $link['title'] ) ) : ?>
					<a
							href="<?= esc_url( $link['url'] ); ?>"
							class="button p image-text__button"
							target="<?= esc_attr( $link['target'] ) ?>">
						<?= esc_html( $link['title'] ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
