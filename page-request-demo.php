<?php /** Template Name: Page Request a Demo and Download Datasheet */
get_header();

$form = [
	'action'  => '',
	'id'      => 'formId',
	'name'    => 'formName',
	'classes' => '',
	'fields'  => [
		[
			'type'        => 'text',
			'name'        => 'Name',
			'id'          => 'nameId',
			'placeholder' => 'Name',
			'classes'     => 'input--lg-half',
		],
		[
			'type'        => 'phone',
			'name'        => 'Phone',
			'id'          => 'phoneId',
			'placeholder' => 'Phone',
			'classes'     => 'input--lg-half',
		],
		[
			'type'        => 'email',
			'name'        => 'Email',
			'id'          => 'emailId',
			'placeholder' => 'Email',
		],
		[
			'type'        => 'text',
			'name'        => 'Company',
			'id'          => 'companyId',
			'placeholder' => 'Company',
		],
		[
			'type'        => 'text',
			'name'        => 'Address',
			'id'          => 'addressId',
			'placeholder' => 'Address',
		],
		[
			'type'        => 'textarea',
			'name'        => 'Message',
			'id'          => 'messageId',
			'placeholder' => 'Message',
			'classes'     => 'input--message',
		],
	],
	'button'  => [
		'name'    => 'buttonName',
		'id'      => 'buttonId',
		'value'   => 'Submit',
		'classes' => 'p',
	],
];

$product_select = [
	'name'           => 'product_select',
	'options'        => apply_filters( 'cai_get_filtered_products', null ),
	'button_classes' => 'h4',
	'title'          => 'Product',
]
?>

	<div class="container-fluid request-demo">
		<div class="container request-demo__container">
			<?php
			echo esc_html( get_template_part( 'template-parts/template-heading' ) );
			?>
			<div class="request-demo__form">
				<?php
				echo esc_html( get_template_part( 'template-parts/form-select', null, $product_select ) );
				?>
				<?php
				echo esc_html( get_template_part( 'template-parts/form', null, $form ) );
				?>
			</div>
		</div>
	</div>

<?php
get_footer();
