<?php
/**
 * $title
 * $name
 * $options
 *  $id
 *  $value
 * $button_classes
 */
extract( $args );

?>

<div class="form-select">
	<div class="form-select-box">
		<div class="form-options-container">
			<?php foreach ( $options as $option ) : ?>
				<?php extract( $option ); ?>
				<div class="form-option radio__container">
					<input
							type="radio"
							class="input__radio input__radio--filters"
							id="<?= esc_attr( $slug . '_' . $id ) ?>"
							value="<?= esc_attr( $slug ) ?>"
							name="<?= esc_attr( $name ) ?>"/>
					<label for="<?= esc_attr( $slug . '_' . $id ) ?>" class="p">
						<?= esc_html( $name ) ?>
					</label>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="form-select--selected <?= ! empty( $button_classes ) ? esc_attr( $button_classes ) : '' ?>">
			<?= esc_html( $title ) ?>
		</div>
	</div>
</div>
