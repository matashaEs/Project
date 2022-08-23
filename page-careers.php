<?php /** Template Name: Careers Page */
$job_offers = apply_filters( 'cai_get_all_job_offers', null );

$form = [
	'form_id'       => get_field( 'form_guid' ) ?? '',
	'fields'        => [
		[
			'type'        => 'text',
			'name'        => 'jobtitle',
			'placeholder' => 'Job Title',
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

get_header();
?>

<div class="container-fluid page-careers">
	<div class="container page-careers__container">
		<div class="page-careers__col page-careers__form-container">
			<?php get_template_part( 'template-parts/template-heading' ); ?>
			<?php get_template_part( 'template-parts/form', null, $form ); ?>
		</div>
		<div class="page-careers__col page-careers__careers-list">
			<?php if ( ! empty( $job_offers ) ) : ?>
				<?php foreach ( $job_offers as $job_offer ) : ?>
					<?php if ( ! empty( $job_offer ) ) : ?>
						<div class="page-careers__career">
							<?php if ( ! empty( $job_offer['date'] ) ) : ?>
								<div class="p page-careers__career-date"><?= esc_html( $job_offer['date'] ) ?></div>
							<?php endif; ?>
							<?php if ( ! empty( $job_offer['name'] ) ) : ?>
								<div class="h4 page-careers__career-name"><?= esc_html( $job_offer['name'] ) ?></div>
							<?php endif; ?>
							<?php if ( ! empty( $job_offer['description'] ) ) : ?>
								<div class="p page-careers__career-description"><?= esc_html( $job_offer['description'] ) ?></div>
							<?php endif; ?>
							<?php if ( ! empty( $job_offer['option'] ) ) : ?>
								<div class="page-careers__career-options">
									<?php foreach ( $job_offer['option'] as $option ) : ?>
										<?php if ( ! empty( $option ) ) : ?>
											<div class="p-large page-careers__career-option<?= empty( $option['description'] ) ? ' page-careers__career-option--no-content' : '' ?>">
												<?php if ( ! empty( $option['title'] ) ) : ?>
													<?= esc_html( $option['title'] ) ?>
												<?php endif; ?>
												<div class="page-careers__option-description-container">
													<?php if ( ! empty( $option['description'] ) ) : ?>
														<div class="p page-careers__option-description">
															<?= wp_kses( $option['description'], [ 'p' => [ '' ] ] ) ?>
														</div>
													<?php endif; ?>
												</div>
											</div>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="p-large page-careers__no-offers">
					<?= esc_html( __( 'Sorry, no job offers for now', 'nuplo' ) ) ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php
get_footer();
