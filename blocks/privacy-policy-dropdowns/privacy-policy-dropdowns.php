<?php
/**
 * $sections [ title, description ]
 */
if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

$breadcrumbs = [
	[
		'name' => __( 'Home', 'nuplo' ),
		'url'  => get_home_url(),
	],
	[
		'name' => __( 'Products', 'nuplo' ),
		'url'  => '#',
	],
]
?>

<section class="container-fluid privacy-policy-dropdowns">
	<div class="container">
		<div class="privacy-policy-dropdowns__row">

			<?php get_template_part( 'template-parts/breadcrumbs', null, $breadcrumbs ); ?>

			<?php if ( ! empty( get_the_title() ) ) : ?>
				<div class="h1 privacy-policy-dropdowns__title">
					<?php the_title(); ?>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $sections ) ) : ?>
				<ul class="privacy-policy-dropdowns__content">
				<?php foreach ( $sections as $section ) : ?>
					<?php if ( ! empty( $section ) ) : ?>
						<li class="h4 privacy-policy-dropdowns__item">
							<?= esc_html( $section['title'] ) ?>
							<div class="privacy-policy-dropdowns__item-answer-container">
								<div class="privacy-policy-dropdowns__item-answer">
									<?= wp_kses(
										$section['description'],
										[
											'p'      => [ '' ],
											'strong' => [ '' ],
										]
									) ?>
								</div>
							</div>
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
				</ul>
			<?php endif; ?>

		</div>
	</div>
</section>
