<?php
/**
 * $title [ text ]
 * $description [ textarea ]
 * $contents [ repeater ]
 *  $icon [ image ]
 *  $title [ text ]
 *  $description [ textarea ]
 * $link [ link ]
 * $background_color [ select: 'default', 'modular--white', 'modular--off-white' ]
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

?>

<section class="container-fluid integrations modular<?= ! empty( $background_color ) ? ' ' . esc_html( $background_color ) : ''?>">
	<div class="modular__bg"></div>
	<div class="container integrations__container">
		<div class="row integrations__row integrations__row-title">
			<?php if ( ! empty( $title ) ) : ?>
				<div class="h2 integrations__title<?= ! empty( $description ) ? ' integrations__title--with-content' : '' ?>">
					<?= esc_html( $title ) ?>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $description ) ) : ?>
				<div class="p integrations__description"><?= esc_html( $description ) ?></div>
			<?php endif; ?>
			<?php if ( ! empty( $link ) ) : ?>
				<div class="row integrations__row integrations__row-button integrations__row-button--wide">
					<a href="<?= esc_url( $link['url'] ) ?>" class="button">
						<?= esc_html( $link['title'] ) ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
		<div class="row integrations__row integrations__row-content">
			<?php if ( ! empty( $contents ) ) : ?>
				<?php foreach ( $contents as $content ) : ?>
					<?php if ( ! empty( $content ) && ( ! empty( $content['icon'] ) || ! empty( $content['title'] ) || ! empty( $content['description'] ) ) ) : ?>
						<div class="integrations__item modular__item--mobile">
							<?php if ( ! empty( $content['icon'] ) ) : ?>
								<div class="integrations__item-icon">
									<img src="<?= esc_url( $content['icon']['sizes']['full_hd'] ); ?>" alt="icon">
								</div>
							<?php endif; ?>
							<?php if ( ! empty( $content['title'] ) ) : ?>
								<div class="h4 integrations__item-title"><?= esc_html( $content['title'] ) ?></div>
							<?php endif; ?>
							<?php if ( ! empty( $content['description'] ) ) : ?>
								<div class="p integrations__item-description">
									<?= esc_html( $content['description'] ) ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $link ) ) : ?>
			<div class="row integrations__row integrations__row-button integrations__row-button--narrow">
				<a href="<?= esc_url( $link['url'] ) ?>" class="button">
					<?= esc_html( $link['title'] ) ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>
