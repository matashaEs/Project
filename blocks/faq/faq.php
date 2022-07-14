<?php
if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}
?>

<div class="container-fluid faq-section">
	<div class="container">
		<div class="faq-section__sidebar">

			<?php if ( ! empty( $title ) ) : ?>
				<div class="h2 faq-section__title"><?= $title ?></div>
			<?php endif; ?>

			<?php foreach ( $faqs as $faq ) : ?>
				<div class="form-select-box form-select-box--faq faq-section__select">
					<div class="form-options-container form-options-container--max-height">
						<div class="form-option form-option-faq">
							<label class="p label-faq">

								<?php if ( ! empty( $faq['faq_content'] ) ) : ?>
									<?= $faq['faq_content'] ?>
								<?php endif; ?>

							</label>
						</div>
					</div>
					<div class="form-select--selected p faq-section__p">

						<?php if ( ! empty( $faq['faq_title'] ) ) : ?>
							<?= $faq['faq_title'] ?>
						<?php endif; ?>

					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>
</div>