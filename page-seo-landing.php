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
						<?php $categories = get_the_category(); ?>
						<?php foreach ( $categories as $category ) { ?>
							<?php
							$term_id             = $category->term_id;
							$category_background = get_field( 'color', 'term_' . $term_id );
							?>
							<a href="<?= esc_url( get_category_link( $term_id ) ); ?>"
							class="button seo-landing__button"
							style="background-color: <?= esc_html( $category_background )?>;
							border-color: <?= esc_html( $category_background )?>">
								<?= esc_html( $category->name ); ?>
							</a>
						<?php } ?>
					</div>
				</div>
				<?php the_content(); ?>
			</div>
			<?php
			if ( ! empty( $quick_links_title ) || ! empty( $quick_links_link ) || ! empty( $quick_links_links ) ) :
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
			endif;
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
