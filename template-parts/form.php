<?php
/**
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

	<form action="" method="post" class="form<?= ! empty( $form_classes ) ? ' ' . esc_attr( $form_classes ) : ''?>"
		<?= ! empty( $form_id ) ? 'id="' . esc_attr( $form_id ) . '"' : ''?>>
		<div class="input-form">
			<?php foreach ( $fields as $field ) : ?>
				<?php if ( ! empty( $field ) ) : ?>
				<div class="input-container <?= ! empty( $field['classes'] ) ? ' ' . esc_attr( $field['classes'] ) : ''?>">
						<?php if ( 'textarea' === $field['type'] ) : ?>
							<textarea
									name="<?= esc_attr( $field['name'] ) ?>"
									placeholder="<?= esc_attr( $field['placeholder'] ) ?>"
									class="input"></textarea>
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
		<div class="form-error">
			<div class="form-error__description">
				<?= esc_html__( 'There was an error trying to send your message. Please try again later', 'nuplo' ) ?>
			</div>
		</div>
	</form>

	<?php if ( ! empty( $after_sending ) ) : ?>
	<div class="form-valid">
		<div class="form-valid__col">
				<?php if ( ! empty( $after_sending['title'] ) ) : ?>
				<div class="h1 form-valid__title"><?= esc_html( $after_sending['title'] ) ?></div>
			<?php endif ?>
		</div>
		<?php if ( ! empty( $after_sending['description'] ) || ! empty( $after_sending['link'] ) ) : ?>
			<div class="form-valid__col form-valid__col--right">
					<?php if ( ! empty( $after_sending['description'] ) ) : ?>
					<div class="p-large form-valid__description"><?= esc_html( $after_sending['description'] ) ?></div>
				<?php endif ?>
					<?php if ( ! empty( $after_sending['link'] ) ) : ?>
					<a href="<?= esc_url( $after_sending['link']['url'] ) ?>" class="button p form-valid__button">
						<?= esc_html( $after_sending['link']['title'] ) ?>
					</a>
				<?php endif ?>
			</div>
		<?php endif ?>
	</div>
	<?php endif; ?>
