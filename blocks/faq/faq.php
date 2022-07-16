<?php
if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}
?>

<div class="container-fluid faq-section">
	<div class="container">
		<div class="faq-section__row">

			<?php if ( ! empty( $title ) ) : ?>
				<div class="h2 faq-section__title"><?= esc_html( $title ); ?></div>
			<?php endif; ?>

			<?php foreach ( $faqs as $faq ) : ?>
				<div class="form-select-box faq-section__select">
					<div class="form-options-container">
						<div class="form-option faq-section__option">
							<label class="p faq-section__label">

								<?php if ( ! empty( $faq['faq_content'] ) ) : ?>
									<?= esc_html( $faq['faq_content'] ); ?>
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
</div>
