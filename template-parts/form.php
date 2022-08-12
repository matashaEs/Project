<?php
/**
 * $action
 * $id
 * $name
 * $classes
 * $fields
 *  $type
 *  $name
 *  $id
 *  $placeholder
 *  $classes
 * $button
 *  $name
 *  $id
 *  $value
 *  $classes
 */
extract( $args );

?>

<form action="<?= esc_url( $action ) ?>" method="post"
		<?php if ( ! empty( $id ) ) : ?>
			id="<?= esc_attr( $id ) ?>"
		<?php endif; ?>
		<?php if ( ! empty( $name ) ) : ?>
			name="<?= esc_attr( $name ) ?>"
		<?php endif; ?>
		class="form <?= ! empty( $classes ) ? ' ' . esc_attr( $classes ) : ''?>"
		target="_blank">
	<div class="input-form">
		<?php foreach ( $fields as $field ) : ?>
			<input
				type="<?= esc_attr( $field['type'] ) ?>" value="" name="<?= esc_attr( $field['name'] ) ?>"
				id="<?= esc_attr( $field['id'] ) ?>" class="input <?= esc_attr( $field['classes'] ) ?>"
				placeholder="<?= esc_attr( $field['placeholder'] ) ?>">
		<?php endforeach; ?>
	</div>
	<input type="submit" name="<?= esc_attr( $button['name'] ) ?>" id="<?= esc_attr( $button['id'] ) ?>"
			class="button <?= esc_attr( $button['classes'] ) ?>"
			value="<?= esc_attr( $button['value'] ) ?>">
</form>
