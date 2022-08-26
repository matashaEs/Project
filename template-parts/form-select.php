<?php
/**
 * $name
 * $select_classes
 * $options [id, slug, name, download_form_guid ]
 * $button_classes
 * $title
 */
extract( $args );

$all_select_classes  = ! empty( $expand_to_top ) ? esc_html( ' select--expand-on-top' ) : '';
$all_select_classes .= ! empty( $select_classes ) ? ' ' . esc_html( $select_classes ) : '';

$product_form = 'product-download' === $name ? 'download_form_guid' : '';

$selected_filter_option      = '';
$selected_filter_option_name = '';

if ( ! empty( get_query_var( 'industry' ) ) && 'industry' === $name ) {
	$selected_filter_option = get_query_var( 'industry' );
} elseif ( ! empty( get_query_var( 'category' ) ) && 'category' === $name ) {
	$selected_filter_option = get_query_var( 'category' );
} elseif ( ! empty( get_query_var( 'content' ) ) && 'content' === $name ) {
	$selected_filter_option = get_query_var( 'content' );
}
?>

<div class="select<?= ! empty( $all_select_classes ) ? esc_html( $all_select_classes ) : '' ?>">
	<div class="select__box">
		<div class="select__options">
			<?php foreach ( $options as $option ) : ?>
				<?php if ( empty( $product_form ) || ! empty( $option[ $product_form ] ) ) : ?>
					<?php $option_guid = ! empty( $option[ $product_form ] ) ? ' formID' . '=' . $option[ $product_form ] : ''; ?>
					<?php $option_selected = ! empty( $selected_filter_option ) && $option['slug'] === $selected_filter_option; ?>
					<?php $selected_filter_option_name = ! empty( $option_selected ) ? $option['name'] : $selected_filter_option_name; ?>
				<div class="select__option radio__container">
					<div><input
								type="radio"
								class="input__radio input__radio--filters"
								id="<?= esc_attr( $option['slug'] . '_' . $option['id'] ) ?>"
								<?= ! empty( $option_guid ) ? esc_html( $option_guid ) : '' ?>
								value="<?= esc_attr( $option['slug'] ) ?>"
								name="<?= esc_attr( $name . '-radio' ) ?>"
								<?= ! empty( $option_selected ) ? ' checked' : ''?>/>
					</div>
					<label for="<?= esc_attr( $option['slug'] . '_' . $option['id'] ) ?>" class="p">
						<?= esc_html( $option['name'] ) ?>
					</label>
				</div>
			<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<div class="select__selected <?= ! empty( $button_classes ) ? esc_attr( $button_classes ) : '' ?>">
			<div class="select__selected-text"><?= ! empty( $selected_filter_option_name ) ? esc_html( $selected_filter_option_name ) : esc_html( $title ) ?></div>
			<div class="select__arrow"></div>
		</div>
		<input type="hidden" name="<?= esc_attr( $name ) ?>" class="input" placeholder="<?= esc_attr( $title ) ?>">
	</div>
</div>
