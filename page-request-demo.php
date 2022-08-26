<?php /** Template Name: Page Request a Demo */
get_header();

$form  = [];
$terms = null;

$selected_category    = get_query_var( 'category' );
$selected_category_id = get_category_by_slug( $selected_category )->cat_ID ?? '';

$form_id = get_field( 'demo_form_guid', 'category_' . $selected_category_id );
$form_id = ! empty( $form_id ) ? $form_id : get_field( 'demo_default_form_guid', 'options' );

if ( $form_id ) {
	$terms = [ 'category' => $selected_category ];
}

$heading_args = [
	'is_download' => true,
];

if ( ! empty( $form_id ) ) :
	$form = [
		'form_id'       => $form_id,
		'fields'        => [
			[
				'type' => 'select',
				'data' => [
					'name'           => 'product',
					'select_classes' => 'select--form',
					'options'        => apply_filters( 'cai_get_filtered_products', $terms ),
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
		'after_sending' => get_field( 'after_sending_form_content' ),
	];
endif;
?>

	<div class="container-fluid request-demo page-with-form">
		<div class="container request-demo__container">
			<?php get_template_part( 'template-parts/template-heading', null, $heading_args ); ?>
			<?php if ( ! empty( $form ) ) : ?>
				<?php echo esc_html( get_template_part( 'template-parts/form', null, $form ) ); ?>
			<?php else : ?>
			<div class="request-demo__no-form">
				<div class="h3">
					<?= esc_html__( 'An error occurred while trying to load the form. Please try again later.', 'nuplo' ) ?>
				</div>
				<a href="<?= esc_url( get_home_url() )?>" class="button p">
					<?= esc_html__( 'Return Home', 'nuplo' ) ?>
				</a>
			</div>
			<?php endif; ?>
		</div>
	</div>

<?php
get_footer();
