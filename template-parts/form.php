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
 * $after_sending
 *  $title
 *  $description
 *  $link
 */
extract( $args );
?>

<form action="" method="post" class="form <?= ! empty( $form_classes ) ? ' ' . esc_attr( $form_classes ) : ''?>"
		portal="<?= esc_attr( $portal ) ?>" id="<?= esc_attr( $form_id ) ?>">
	<div class="input-form">
		<?php foreach ( $fields as $field ) : ?>
			<?php if ( ! empty( $field ) ) : ?>
			<div class="input-container <?= ! empty( $field['classes'] ) ? ' ' . esc_attr( $field['classes'] ) : ''?>">
					<?php if ( 'textarea' === $field['type'] ) : ?>
						<textarea
								name="<?= esc_attr( $field['name'] ) ?>"
								placeholder="<?= esc_attr( $field['placeholder'] ) ?>"
								class="input input-message <?= ! empty( $field['classes'] ) ? ' ' . esc_attr( $field['classes'] ) : '' ?>"></textarea>
					<?php elseif ( 'select' === $field['type'] ) : ?>
						<?php get_template_part( 'template-parts/form-select', null, $field['data'] ); ?>
					<?php else : ?>
						<input
							type="<?= esc_attr( $field['type'] ) ?>"
							name="<?= esc_attr( $field['name'] ) ?>"
							placeholder="<?= esc_attr( $field['placeholder'] ) ?>"
							class="input">
					<?php endif; ?>
				<div class="p input__error"></div>
			</div>
		<?php endif; ?>
		<?php endforeach; ?>
	</div>
	<button type="button" class="button <?= esc_attr( $button['classes'] ) ?>">
		<?= esc_attr( $button['value'] ) ?>
	</button>
</form>

<?php if ( ! empty( $after_sending ) ) : ?>
	<div class="form-valid">
		<div class="form-valid__col">
			<?php if ( ! empty( $after_sending['title'] ) ) : ?>
				<div class="h1 form-valid__title"><?= esc_html( $after_sending['title'] ) ?></div>
			<?php endif ?>
		</div>
		<div class="form-valid__col form-valid__col--right">
			<?php if ( ! empty( $after_sending['description'] ) ) : ?>
				<div class="p-large form-valid__description"><?= esc_html( $after_sending['description'] ) ?></div>
			<?php endif ?>
			<?php if ( ! empty( $after_sending['link'] ) ) : ?>
				<a href="<?= esc_url( $after_sending['url'] ) ?>" class="button p form-valid__button">
					<?= esc_html( $after_sending['link']['title'] ) ?>
				</a>
			<?php endif ?>
		</div>
	</div>
<?php endif ?>
