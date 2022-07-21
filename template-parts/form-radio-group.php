<?php
/**
 * $name
 * $options [id, slug]
 */
extract( $args );
?>

<?php if ( ! empty( $options ) ) : ?>
<?php foreach ( $options as $option ) : ?>
	<div class="radio__container">
		<input
				type="radio"
				class="input__radio input__radio--filters"
				id="<?= esc_attr( $option['slug'] . '_' . $option['id'] ) ?>"
				value="<?= esc_attr( $option['slug'] ) ?>"
				name="<?= esc_attr( $name ) ?>"/>
		<label class="h4" for="<?= esc_attr( $option['slug'] . '_' . $option['id'] ) ?>">
			<?= esc_html( $option['name'] ) ?>
		</label>
	</div>
<?php endforeach; ?>
<?php endif; ?>
