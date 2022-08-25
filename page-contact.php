<?php
/** Template Name: Contact Page */

$marker_details = get_field( 'marker_on_the_map', 'options' );

$interests = [
	[
		'id'   => 'interest-1',
		'slug' => 'ERP',
		'name' => 'ERP',
	],
	[
		'id'   => 'interest-2',
		'slug' => 'EDI',
		'name' => 'EDI',
	],
	[
		'id'   => 'interest-3',
		'slug' => 'MES',
		'name' => 'MES',
	],
	[
		'id'   => 'interest-4',
		'slug' => 'WMS',
		'name' => 'WMS',
	],
	[
		'id'   => 'interest-5',
		'slug' => 'Document Management',
		'name' => 'Document Management',
	],
];

$form = [
	'form_id'       => get_field( 'form_guid' ) ?? '',
	'fields'        => [
		[
			'type'        => 'text',
			'name'        => 'firstname',
			'placeholder' => 'First Name',
			'classes'     => 'input--lg-half',
		],
		[
			'type'        => 'text',
			'name'        => 'lastname',
			'placeholder' => 'Last Name',
			'classes'     => 'input--lg-half',
		],
		[
			'type'        => 'text',
			'name'        => 'company',
			'placeholder' => 'Company Name',
		],
		[
			'type'        => 'email',
			'name'        => 'email',
			'placeholder' => 'Email',
		],
		[
			'type' => 'select',
			'data' => [
				'name'           => 'interest',
				'select_classes' => 'select--form select--transparent',
				'options'        => $interests,
				'button_classes' => 'h4',
				'title'          => 'Interest',
			],
		],
		[
			'type'        => 'textarea',
			'name'        => 'message',
			'placeholder' => 'Message',
		],
	],
	'button'        => [
		'value'   => 'Request A Demo',
		'classes' => 'p button__send-form',
	],
	'after_sending' => get_field( 'after_sending_form_content' ),
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
<div class="container-fluid page-contact page-with-form">
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

		<?php get_template_part( 'template-parts/form', null, $form ); ?>
	</div>

	<?php the_static_acf_block( 'map', $marker_details ); ?>
</div>

<?php

get_footer();
