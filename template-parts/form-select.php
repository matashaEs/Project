<?php
/**
 * $name
 * $options [id, slug, value, name]
 * $button_classes
 * $title
 */
extract( $args );

?>

<?php if ( ! empty( $options ) ) : ?>
<div class="form-select">
	<div class="form-select-box">
		<input type="hidden" name="<?= esc_attr( $name ) ?>">
		<div class="form-options-container">
			<?php foreach ( $options as $option ) : ?>
				<div class="form-option radio__container">
					<input
							type="radio"
							class="input__radio input__radio--filters"
							id="<?= esc_attr( $option['slug'] . '_' . $option['id'] ) ?>"
							value="<?= esc_attr( $option['slug'] ) ?>"
							name="<?= esc_attr( $name . '-radio' ) ?>"/>
					<label for="<?= esc_attr( $option['slug'] . '_' . $option['id'] ) ?>" class="p">
						<?= esc_html( $option['name'] ) ?>
					</label>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="form-select--selected <?= ! empty( $button_classes ) ? esc_attr( $button_classes ) : '' ?>">
			<?= esc_html( $title ) ?>
		</div>
	</div>
</div>
<?php endif; ?>
