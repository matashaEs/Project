<?php
/**
 * $title
 * $faqs [ repeater: faq_title, faq_content ]
 * $background_color [ select: 'default', 'modular--white', 'modular--off-white' ]
 */

if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

?>

<section class="container-fluid faq-section modular<?= ! empty( $background_color ) ? ' ' . esc_html( $background_color ) : ''?>">
	<div class="container">
		<div class="faq-section__row">

			<?php if ( ! empty( $title ) ) : ?>
				<div class="h2 faq-section__title"><?= esc_html( $title ); ?></div>
			<?php endif; ?>

			<?php if ( ! empty( $faqs ) ) : ?>
				<?php foreach ( $faqs as $faq ) : ?>
					<div class="form-select-box faq-section__select modular__item--mobile">
						<div class="form-options-container">
							<div class="form-option faq-section__option">
								<label class="p faq-section__label">

									<?php if ( ! empty( $faq['faq_content'] ) ) : ?>
										<?= wp_kses( $faq['faq_content'], [ 'p' => [ '' ] ] ) ?>
									<?php endif; ?>

								</label>
							</div>
						</div>
						<div class="form-select--selected p faq-section__p">

							<?php if ( ! empty( $faq['faq_title'] ) ) : ?>
								<?= esc_html( $faq['faq_title'] ); ?>
							<?php endif; ?>

						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
