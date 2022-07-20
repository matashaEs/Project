<?php
/**
 * $title [ text ]
 * $description [ textarea ]
 * $contents [ repeater ]
 *  $icon [ image ]
 *  $title [ text ]
 *  $description [ textarea ]
 * $link [ link ]
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

?>

<section class="container-fluid integrations">
	<div class="container">
		<?php if ( ! empty( $title ) ) : ?>
			<div class="row integrations__row integrations__row-title">
				<div class="h2 integrations__title"><?= esc_html( $title ) ?></div>
			</div>
		<?php endif; ?>
		<div class="row integrations__row integrations__row-content">
			<?php if ( ! empty( $contents ) ) : ?>
				<?php foreach ( $contents as $content ) : ?>
					<?php if ( ! empty( $content ) ) : ?>
						<div class="integrations__item">
							<div class="integrations__item-icon">
								<img src="<?= esc_url( $content['icon']['sizes']['full_hd'] ); ?>" alt="icon">
							</div>
							<div class="h4 integrations__item-title"><?= esc_html( $content['title'] ) ?></div>
							<div class="integrations__item-description"><?= esc_html( $content['description'] ) ?></div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="row integrations__row integrations__row-button"></div>
	</div>
</section>
