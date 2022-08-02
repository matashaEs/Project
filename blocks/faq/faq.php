<?php
if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

$section_background_color_class = '';

if ( ! empty( $background_color ) ) {
	if ( 'white' === $background_color ) {
		$section_background_color_class = ' modular--white';
	} elseif ( 'off-white' === $background_color ) {
		$section_background_color_class = ' modular--off-white';
	}
}
?>

<section class="container-fluid faq-section modular<?= ! empty( $background_color ) ? ' ' . esc_html( $background_color ) : ''?>">
	<div class="modular__bg"></div>
	<div class="container">
		<div class="faq-section__row">

			<?php if ( ! empty( $title ) ) : ?>
				<div class="h2 faq-section__title"><?= esc_html( $title ); ?></div>
			<?php endif; ?>

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

		</div>
	</div>
</section>
