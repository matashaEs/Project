<?php /** Template Name: Page Customer Support */
get_header();

$hubspot_portal_id  = get_field( 'portal_id', 'options' );
$supported_products = apply_filters( 'cai_get_products_with_support_form_id', null );

$supported_products_select_configuration = [
	'name'           => 'support-product',
	'select_classes' => 'select--form',
	'options'        => $supported_products,
	'button_classes' => 'h4',
	'title'          => 'Product',
];

/**
 * Getting product info from query parameter.
 */
$product_slug = get_query_var( 'support-product' );
if ( ! empty( $product_slug ) && array_key_exists( $product_slug, $supported_products ) ) {
	$supported_product = $supported_products[ $product_slug ];
}
?>

<div class="container-fluid request-demo page-with-form customer-support-form">
	<div class="container request-demo__container">
		<?php
		get_template_part( 'template-parts/template-heading' );

		if ( ! empty( $hubspot_portal_id ) ) :
			?>
			<div class="customer-support-form__form-container">
				<?php if ( empty( $supported_product ) ) : ?>
					<h3 class="customer-support-form__select-product-title">
						<?= esc_html__( 'Select Your Product:', 'nuplo' ) ?>
					</h3>
					<?php
					get_template_part( 'template-parts/form-select', null, $supported_products_select_configuration );
				else :
					get_template_part( 'template-parts/form-select', null, $supported_products_select_configuration );
					?>
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
					<script>
						hbspt.forms.create({
							region: "na1",
							portalId: "<?= esc_html( $hubspot_portal_id ) ?>",
							formId: "<?= esc_html( $supported_product['form_id'] ) ?>"
						});
					</script>
				<?php endif; ?>
			</div>
		<?php else : ?>
			<div class="no-form">
				<div class="h3">
					<?= esc_html__( 'An error occurred while trying to load the form. Please try again later.', 'nuplo' ) ?>
				</div>
				<a href="<?= esc_url( get_home_url() ) ?>" class="button p">
					<?= esc_html__( 'Return Home', 'nuplo' ) ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</div>


<?php
get_footer();
