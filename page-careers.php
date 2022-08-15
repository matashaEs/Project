<?php /** Template Name: Careers Page */
$job_offers = apply_filters( 'cai_get_all_job_offers', null );
$form       = [
	'id'     => 'formId',
	'name'   => 'formName',
	'fields' => [
		[
			'type'        => 'text',
			'name'        => 'Job Title',
			'id'          => 'jobTitleId',
			'placeholder' => 'Job Title',
		],
		[
			'type'        => 'text',
			'name'        => 'First Name',
			'id'          => 'firstNameId',
			'placeholder' => 'First Name',
		],
		[
			'type'        => 'text',
			'name'        => 'Last Name',
			'id'          => 'lastNameId',
			'placeholder' => 'Last Name',
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
		'value'   => 'Submit',
		'classes' => 'p',
	],
];

get_header();
?>

<div class="container-fluid page-careers">
	<div class="container page-careers__container">
		<div class="page-careers__col page-careers__form-container">
			<?php get_template_part( 'template-parts/template-heading' ); ?>
			<div class="page-careers__form">
				<?php get_template_part( 'template-parts/form', null, $form ); ?>
			</div>
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
