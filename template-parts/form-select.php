<?php
/**
 * $name
 * $select_classes
 * $options [id, slug, name]
 * $button_classes
 * $title
 */
extract( $args );

$all_select_classes  = ! empty( $expand_to_top ) ? esc_html( ' select--expand-on-top' ) : '';
$all_select_classes .= ! empty( $select_classes ) ? ' ' . esc_html( $select_classes ) : '';
?>

<div class="select<?= ! empty( $all_select_classes ) ? esc_html( $all_select_classes ) : '' ?>">
	<div class="select__box">
		<div class="select__options">
			<?php foreach ( $options as $option ) : ?>
				<div class="select__option radio__container">
					<div><input
								type="radio"
								class="input__radio input__radio--filters"
								id="<?= esc_attr( $option['slug'] . '_' . $option['id'] ) ?>"
								value="<?= esc_attr( $option['slug'] ) ?>"
								name="<?= esc_attr( $name . '-radio' ) ?>"/>
					</div>
					<label for="<?= esc_attr( $option['slug'] . '_' . $option['id'] ) ?>" class="p">
						<?= esc_html( $option['name'] ) ?>
					</label>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="select__selected <?= ! empty( $button_classes ) ? esc_attr( $button_classes ) : '' ?>">
			<div class="select__selected-text"><?= esc_html( $title ) ?></div>
			<div class="select__arrow"></div>
		</div>
		<input type="hidden" name="<?= esc_attr( $name ) ?>" class="input" placeholder="<?= esc_attr( $title ) ?>">
	</div>
</div>
