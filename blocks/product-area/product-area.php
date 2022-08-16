<?php
/**
 *  $title
 *  $icon
 *  $contents [ $title, $description ]
 *  $link
 *  $image
 *  $background_color
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}
$heading_background_color = '';

if ( 'modular--off-white' == $background_color ) {
	$heading_background_color = ' product-area__container--off-white';
}

if ( 'modular--white' == $background_color ) {
	$heading_background_color = ' product-area__container--white';
}
?>

<section class="container-fluid product-area">
	<div class="container product-area__container<?= esc_html( $heading_background_color ) ?>">
		<div class="product-area__heading">
			<div class="product-area__heading-name">
			<?php if ( ! empty( $icon ) ) : ?>
				<div class="product-area__heading-icon">
					<img src="<?= esc_url( $icon['sizes']['full_hd'] ); ?>" alt="CAI" class="product-area__heading-image">
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $title ) ) : ?>
				<h4 class="product-area__heading-title">
					<?= esc_html( $title ); ?>
				</h4>
			<?php endif; ?>
			</div>
			<?php if ( ! empty( $link ) ) : ?>
				<div class="product-area__button">
					<a href="<?= esc_url( $link['url'] ) ?>" class="button p" target=" <?= esc_attr( $link['target'] ) ?>">
						<?= esc_html( $link['title'] ) ?>
					</a>
				</div>
			</div>
		<?php endif; ?>
		<div class="product-area__content">
			<?php if ( ! empty( $contents ) ) : ?>
				<?php foreach ( $contents as $content ) : ?>
					<div class="product-area__content-title <?= empty( $content['description'] ) ? 'product-area__content-title--empty' : ''; ?>">
						<div class="product-area__content-title--text p-large">
							<?= esc_html( $content['title'] ) ?>
						</div>
					</div>
					<div class="product-area__content-description p"> <?= wp_kses( $content['description'], [ 'p' => [ '' ] ] )?></div>
				<?php endforeach; ?>
				<?php if ( ! empty( $link ) ) : ?>
					<div class="product-area__content-button">
						<a href="<?= esc_url( $link['url'] ) ?>" class="button p"
							target=" <?= esc_attr( $link['target'] ) ?>">
							<?= esc_html( $link['title'] ) ?>
						</a>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
