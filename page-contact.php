<?php
/** Template Name: Contact Page */

$marker_details = get_field( 'marker_on_the_map', 'options' );
$form           = [
	'id'     => 'formId',
	'name'   => 'formName',
	'fields' => [
		[
			'type'        => 'text',
			'name'        => 'Name',
			'id'          => 'nameId',
			'placeholder' => 'Name',
		],
		[
			'type'        => 'email',
			'name'        => 'Email',
			'id'          => 'emailId',
			'placeholder' => 'Email',
		],
		[
			'type'        => 'textarea',
			'name'        => 'Message',
			'id'          => 'messageId',
			'placeholder' => 'Message',
		],
	],
	'button' => [
		'name'    => 'submit',
		'id'      => 'buttonId',
		'value'   => 'Contact',
		'classes' => 'p',
	],
];

if ( have_rows( 'contact_information', 'option' ) ) :
	while ( have_rows( 'contact_information', 'option' ) ) :
		the_row();
		$address     = get_sub_field( 'address' );
		$phone_first = get_sub_field( 'phone_first' );
		$mail        = get_sub_field( 'mail' );
	endwhile;
endif;

get_header();
?>
<div class="container-fluid page-contact">
	<div class="container page-contact__container">
		<div class="page-contact__col page-contact__content">
			<?php get_template_part( 'template-parts/template-heading' ); ?>
			<ul class="page-contact__contact-data">
				<?php if ( ! empty( $address ) ) : ?>
					<li class="p"><?= esc_html( $address ) ?></li>
				<?php endif; ?>
				<?php if ( ! empty( $phone_first ) ) : ?>
					<li class="p"><?= esc_html( $phone_first ) ?></li>
				<?php endif; ?>
				<?php if ( ! empty( $mail ) ) : ?>
					<li class="p"><a href="mailto: <?= esc_html( $mail ) ?>"> <?= esc_html( $mail ) ?></a></li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="page-contact__col page-contact__form">
			<?php get_template_part( 'template-parts/form', null, $form ); ?>
		</div>
	</div>
</div>

<?php

the_static_acf_block( 'map', $marker_details );

get_footer();
