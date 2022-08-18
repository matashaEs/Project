<?php
/**
 * $portal
 * $form_id
 * $form_classes
 * $fields
 *  $type
 *  $name
 *  $placeholder
 *  $classes
 * $button
 *  $value
 *  $classes
 */
extract( $args );

?>

<form action="" method="post" class="form <?= ! empty( $form_classes ) ? ' ' . esc_attr( $form_classes ) : ''?>"
		portal="<?= esc_attr( $portal ) ?>" id="<?= esc_attr( $form_id ) ?>">
	<div class="input-form">
		<?php foreach ( $fields as $field ) : ?>
			<?php if ( ! empty( $field ) ) : ?>
				<?php if ( 'textarea' === $field['type'] ) : ?>
					<textarea
							name="<?= esc_attr( $field['name'] ) ?>"
							placeholder="<?= esc_attr( $field['placeholder'] ) ?>"
							class="input <?= ! empty( $field['classes'] ) ? ' ' . esc_attr( $field['classes'] ) : '' ?>"></textarea>
				<?php else : ?>
					<input
						type="<?= esc_attr( $field['type'] ) ?>"
						name="<?= esc_attr( $field['name'] ) ?>"
						placeholder="<?= esc_attr( $field['placeholder'] ) ?>"
						class="input <?= ! empty( $field['classes'] ) ? ' ' . esc_attr( $field['classes'] ) : ''?>">
			<?php endif; ?>
			<div class="input__error"></div>
		<?php endif; ?>
		<?php endforeach; ?>
	</div>
	<button type="button" class="button <?= esc_attr( $button['classes'] ) ?>">
		<?= esc_attr( $button['value'] ) ?>
	</button>
</form>
