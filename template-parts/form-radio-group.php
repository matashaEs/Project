<?php
/**
 * $name
 * $options [id, slug]
 */
extract( $args );

$selected_filter_option = '';

if ( ! empty( get_query_var( 'category' ) ) && 'category' === $name ) {
	$selected_filter_option = get_query_var( 'category' );
}
?>

<?php foreach ( $options as $option ) : ?>
	<?php $option_selected = ! empty( $selected_filter_option ) && $option['slug'] === $selected_filter_option; ?>
	<div class="radio__container<?= ! empty( $classes ) ? ' ' . esc_html( $classes ) : '' ?>">
		<input
				type="radio"
				class="input__radio input__radio--filters"
				id="<?= esc_attr( $option['slug'] . '_' . $option['id'] ) ?>"
				value="<?= esc_attr( $option['slug'] ) ?>"
				name="<?= esc_attr( $name ) ?>"
				<?= ! empty( $option_selected ) ? ' checked' : '' ?>/>
		<label class="radio__label h4" for="<?= esc_attr( $option['slug'] . '_' . $option['id'] ) ?>">
			<?= esc_html( $option['name'] ) ?>
			<div class="radio__label-close h3 <?= empty( $option_selected ) ? '' : 'radio__label-close--active'?>">+</div>
		</label>
	</div>
<?php endforeach; ?>
