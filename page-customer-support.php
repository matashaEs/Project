<?php /** Template Name: Page Customer Support */
get_header();
?>

<div class="container-fluid request-demo page-with-form customer-support-form">
	<div class="container request-demo__container">
		<?php
		get_template_part( 'template-parts/template-heading' );

		$hubspot_portal_id = get_field( 'portal_id', 'options' );
		$hubspot_form_id   = get_field( 'form_guid', get_the_ID() );

		if ( ! empty( $hubspot_portal_id ) && ! empty( $hubspot_form_id ) ) :
			?>
			<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
			<script>
				hbspt.forms.create({
					region: "na1",
					portalId: "<?= esc_html( $hubspot_portal_id ) ?>",
					formId: "<?= esc_html( $hubspot_form_id ) ?>"
				});
			</script>
		<?php else : ?>
			<div class="no-form">
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
