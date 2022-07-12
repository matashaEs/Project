<?php
/**
 * $title
 * $contents
 * $color_pallet
 * $is_small
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

$style  = ! empty( $color_pallet ) ? ' highlights--' . $color_pallet : '';
$style .= ! empty( $is_small ) ? ' highlights--small' : '';

?>

<?php if ( ! empty( $contents ) ) : ?>
	<section class="container-fluid highlights<?= esc_html( $style ) ?>">
		<div class="container highlights__container">
			<div class="row highlights__row ">
				<?php if ( ! empty( $title ) ) : ?>
					<h2 class="highlights__title"><?= esc_html( $title ) ?></h2>
				<?php endif; ?>
			</div>
			<div class="row highlights__row highlights__row-content">
				<?php foreach ( $contents as $content ) : ?>
						<div class="highlights__item">
							<?php if ( ! empty( $content['title'] ) ) : ?>
								<h4 class="highlights__item-title"><?= esc_html( $content['title'] ); ?></h4>
							<?php endif; ?>
							<?php if ( ! empty( $content['description'] ) ) : ?>
								<p class="highlights__item-description"><?= esc_html( $content['description'] ); ?></p>
							<?php endif; ?>
						</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
