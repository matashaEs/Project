<?php
if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

$form = [
	'form_id'       => $form_guid ?? '',
	'form_classes'  => 'newsletter__form',
	'fields'        => [
		[
			'type'        => 'email',
			'name'        => 'email',
			'placeholder' => 'Email',
			'classes'     => 'newsletter__field',
		],
	],
	'button'        => [
		'value'   => 'Submit',
		'classes' => 'p button--white button__send-form newsletter__button',
	],
	'after_sending' => $after_sending,
];
?>

<div class="container-fluid newsletter">
	<div class="container newsletter__container">
		<div class="newsletter__row">
			<?php if ( ! empty( $content ) ) : ?>
				<h3 class="newsletter__title"><?= esc_html( $content ) ?></h3>
			<?php endif; ?>
			<?php get_template_part( 'template-parts/form', null, $form ); ?>
		</div>
	</div>
</div>
