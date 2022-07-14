<?php
if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}
?>

<div class="container-fluid newsletter">
	<div class="container">
		<div class="newsletter__row">
			<?php if ( ! empty( $content ) ) : ?>
				<h3 class="newsletter__title"><?= esc_html( $content ) ?></h3>
			<?php endif; ?>
			<div class="newsletter__form-section">
				<form class="newsletter__form" method="post" action="">
					<div class="newsletter__field">
						<input type="text" name="email" class="newsletter__input newsletter__email input--error"
								placeholder="<?php _e( 'Email', 'nuplo' ); ?>">
						<div class="newsletter__text-error"></div>
					</div>
					<button type="button" class="button button--white newsletter__button">
						<?php _e( 'Submit', 'nuplo' ); ?>
					</button>
				</form>
				<div class="newsletter__form-valid h4">
					<?php _e( 'Thank You for Signing Up for Our Newsletter!', 'nuplo' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
