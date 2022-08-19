<?php /** Template Name: Page Request a Demo and Download Datasheet */
get_header();

$form_info = [];
$form      = [];

foreach ( explode( ' ', trim( get_field( 'form_shortcode' ), '[]' ) ) as $field ) {
	$field_array                  = explode( '=', $field );
	$form_info[ $field_array[0] ] = $field_array[1] ?? '';
}

$form = [
    'portal'        => $form_info['portal'] ?? '',
    'form_id'       => $form_info['id'] ?? '',
    'fields'        => [
        [
            'type' => 'select',
            'data' => [
                'name'           => 'product',
                'select_classes' => 'select--form',
                'options'        => apply_filters( 'cai_get_filtered_products', null ),
                'button_classes' => 'h4',
                'title'          => 'Product',
            ],
        ],
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
            'type'        => 'email',
            'name'        => 'email',
            'placeholder' => 'Email',
        ],
        [
            'type'        => 'text',
            'name'        => 'company',
            'placeholder' => 'Company Name',
        ],
        [
            'type'        => 'textarea',
            'name'        => 'message',
            'placeholder' => 'Message',
        ],
    ],
    'button'        => [
        'value'   => 'Submit',
        'classes' => 'p button__send-form',
    ],
    'after_sending' => get_field( 'after_sending' ),
];
?>

	<div class="container-fluid request-demo page-with-form">
		<div class="container request-demo__container">
			<?php echo esc_html( get_template_part( 'template-parts/template-heading' ) ); ?>
			<?php if ( ! empty( $form ) ) : ?>
				<?php echo esc_html( get_template_part( 'template-parts/form', null, $form ) ); ?>
			<?php endif; ?>
		</div>
	</div>

<?php
get_footer();
