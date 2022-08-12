<?php /** Template Name: SEO Landing Page */

get_header();

$quick_links_title = get_field( 'quick_links_title' );
$quick_links_link  = get_field( 'quick_links_button' );
$quick_links_links = get_field( 'quick_links_links' );


?>

<div class="container-fluid seo-landing">
	<div class="container seo-landing__container">
		<?php if ( ! empty( get_the_post_thumbnail() ) ) : ?>
			<div class="seo-landing__image">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>
		<div class="seo-landing__content">
			<?php
			get_template_part(
				'template-parts/quick-links',
				null,
				[
					'container_class' => 'sidebar-and-content__sidebar',
					'sidebar'         => [
						'mobileName' => __( 'Quick Links', 'nuplo' ),
						'blocks'     => [
							'links' => [
								'title' => $quick_links_title,
								'link'  => $quick_links_link,
								'links' => $quick_links_links,
							],
						],
					],
				]
			);

			?>
			<div class="seo-landing__content--left">
				<div class="seo-landing__breadcrumbs">
					<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
				</div>
				<div class="seo-landing__title">
					<?php the_title(); ?>
				</div>
				<div class="seo-landing__row">
					<div class="seo-landing__date">
						<?= get_the_date(); ?>
					</div>
					<div class="seo-landing__categories">
						<a href="" class="button button--orange seo-landing__button"> <?= esc_html( __( 'ERP', 'nuplo' ) )  ?> </a>
					</div>
				</div>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
