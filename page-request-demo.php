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
			'classes'     => 'request-demo__input',
		],
		[
			'type'        => 'phone',
			'name'        => 'Phone',
			'id'          => 'phoneId',
			'placeholder' => 'Phone',
			'classes'     => 'request-demo__input',
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
/**
 * TODO: replace options to products
 */

$form_select = [
	'options'        => [
		[
			'id'   => 'option',
			'slug' => 'Option',
			'name' => 'Option 1',
		],
		[
			'id'   => 'option',
			'slug' => 'Option',
			'name' => 'Option 2',
		],
	],
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
				echo esc_html( get_template_part( 'template-parts/form-select', null, $form_select ) );
				?>
				<?php
				echo esc_html( get_template_part( 'template-parts/form', null, $form ) );
				?>
			</div>
		</div>
	</div>

<?php
get_footer();
