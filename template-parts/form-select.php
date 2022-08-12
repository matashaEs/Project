<?php
/**
 * $name
 * $options [id, slug, name]
 * $button_classes
 * $title
 */
extract( $args );

?>

<div class="select">
    <div class="select__box<?= ! empty( $expand_to_top ) ? esc_html( ' select__box--expand-on-top' ) : '' ?>">
        <input type="hidden" name="<?= esc_attr( $name ) ?>">
        <div class="select__options">
			<?php foreach ( $options as $option ) : ?>
                <div class="select__option radio__container">
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
        <div class="select__selected <?= ! empty( $button_classes ) ? esc_attr( $button_classes ) : '' ?>">
            <div class="select__content">
                <span><?= esc_html( $title ) ?></span>
                <span class="select__arrow"></span>
            </div>
        </div>
    </div>
</div>
