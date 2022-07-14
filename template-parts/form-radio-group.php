<?php
/**
 * $title
 * $name
 * $options
 *  $id
 *  $value
 */
extract( $args );
?>

<?php foreach ( $options as $option ) : ?>
	<div class="radio__container">
		<input type="radio"
				class="input__radio input__radio--filters"
				id="<?= esc_attr( $option['id'] ) ?>"
				value="<?= esc_attr( $option['value'] ) ?>"
				name="<?= esc_attr( $name ) ?>"/>
		<label class="h4" for="<?= esc_attr( $option['id'] ) ?>">
			<?= esc_html( $option['value'] ) ?>
		</label>
	</div>
<?php endforeach; ?>
