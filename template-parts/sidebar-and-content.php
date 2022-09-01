<?php
/**
 * $title
 * $breadcrumbs
 * $sidebar
 *  $mobileName ( name of sidebar on mobile )
 *  $blocks ( 'radio-group' 'selects', 'navigation', 'links'; each block corresponds to a template part  )
 * $content_type
 */

extract( $args );

$container_class   = 'the_content' === $content_type ? ' sidebar-and-content__container--the-content' : '';
$content_col_class = 'the_content' === $content_type ? ' sidebar-and-content__content--the-content' : '';

?>

<section class="container-fluid sidebar-and-content">
	<div class="container sidebar-and-content__container<?= esc_html( $container_class ) ?>">

		<!-- Sidebar start -->
		<div class="sidebar-and-content__sidebar-bg"></div>

		<?php
		get_template_part(
			'template-parts/quick-links',
			null,
			[
				'container_class' => 'sidebar-and-content__sidebar',
				'title'           => $title,
				'sidebar'         => $sidebar,
			]
		);
		?>
		<!-- Sidebar end -->


		<!-- Items list start -->
		<div class="sidebar-and-content__content<?= esc_attr( $content_col_class ) ?>">
			<?php if ( ! empty( $title ) ) : ?>
				<h1 class="sidebar-and-content__title <?= is_single() ? 'sidebar-and-content__title--single' : '' ?>">
					<?= esc_html( $title ) ?>
				</h1>
			<?php endif; ?>

			<div class="sidebar-and-content__content-container">
				<?php if ( 'items' === $content_type ) : ?>
					<?php if ( ! empty( $items ) ) : ?>
						<?php
						foreach ( $items as $item ) :
							if ( ! empty( $item['background'] ) ) {
								$background = $item['background'];
							} else {
								$background = get_template_directory_uri() . '/assets/img/placeholder.jpg';
							}
							?>
						<div class="sidebar-and-content__item-container">
							<a href="<?= esc_url( $item['url'] ); ?>" class="sidebar-and-content__item">
								<div class="sidebar-and-content__item-image-container">
									<div class="sidebar-and-content__item-image"
										style="background-image: url('<?= esc_html( $background ); ?>');">
									</div>
									<?php if ( ! empty( $item ['category'] ) ) : ?>
										<object class="sidebar-and-content__object">
											<a href="<?= esc_url( $item['category']['url'] ) ?>"
												class="sidebar-and-content__item-category--link">
												<div class="button p sidebar-and-content__item-category"
													style="background: <?= esc_html( $item['category']['color'] ); ?>; border-color: <?= esc_html( $item['category']['color'] ); ?>">
													<?= esc_html( $item ['category']['name'] ) ?>
												</div>
											</a>
										</object>
									<?php endif; ?>
								</div>
								<?php if ( ! empty( $item ['name'] ) ) : ?>
									<div class="sidebar-and-content__item-title"><?= esc_html( $item ['name'] ) ?></div>
								<?php endif; ?>
								<?php if ( ! empty( $item ['excerpt'] ) ) : ?>
									<div class="sidebar-and-content__item-excerpt">
										<?= esc_html( $item ['excerpt'] ); ?>
									</div>
								<?php endif; ?>
							</a>
						</div>
						<?php endforeach; ?>
				<?php else : ?>
					<h3>
						<?php _e( 'No products were found matching your filters...', 'nuplo' ); ?>
					</h3>
				<?php endif; ?>
			</div>

		<?php elseif ( 'the_content' === $content_type ) : ?>
			<?php the_content(); ?>
		<?php elseif ( 'search_results' === $content_type ) : ?>
			<?= apply_filters( 'cai_get_filtered_results', null ) ?>
			<div class="container-fluid search-page">
				<div class="container">
					<div class="search-page__posts-container" id="products">
						<div class="search-page__top">
							<div class="h2 search-page__title">Products</div>
							<a href="search-show-all" class="button search-page__button">See All Products</a>
						</div>
						<div class="search-page__posts">
							<?php $i = 0; ?>
							<?php
							while ( have_posts() && $i < 2 ) {
								the_post();
								?>
								<?php if ( 'product' == get_post_type() ) : ?>
									<a class="search-page__post" href="<?php the_permalink(); ?>">
										<div>
											<div class="h4  search-page__post-title"><?php the_title(); ?></div>
											<?php if ( strlen( get_the_excerpt() ) > 200 ) : ?>
												<div class="search-page__excerpt p"><?php echo substr( get_the_excerpt(), 0, 200 ) . '...'; ?></div>
											<?php endif; ?>
										</div>
										<div class="p search-page__read-more">
											<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
										</div>
									</a>
									<?php $i ++; ?>
								<?php endif; ?>
							<?php } ?>
							<?php if ( $i == 0 ) : ?>
								<p class="search-page__no-posts"><?php _e( 'Sorry, no products matched your criteria.', 'nuplo' ); ?></p>
							<?php endif; ?>
						</div>
					</div>
					<div class="search-page__posts-container" id="categories">
						<div class="h2 search-page__title">Categories</div>
						<div class="search-page__posts">
							<?php $i = 0; ?>
							<?php
							while ( have_posts() && $i < 4 ) {
								the_post();
								?>
								<?php if ( 'page-product-category.php' == get_page_template_slug() ) : ?>
									<a class="search-page__post" href="<?php the_permalink(); ?>">
										<div>
											<div class="h4 search-page__post-title"><?php the_title(); ?></div>
											<?php if ( strlen( get_the_excerpt() ) > 200 ) : ?>
												<div class="search-page__excerpt p"><?php echo substr( get_the_excerpt(), 0, 200 ) . '...'; ?></div>
											<?php endif; ?>
										</div>
										<div class="p search-page__read-more">
											<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
										</div>
									</a>
									<?php $i ++; ?>
								<?php endif; ?>
							<?php } ?>
							<?php if ( $i == 0 ) : ?>
								<p class="search-page__no-posts"><?php _e( 'Sorry, no categories matched your criteria.', 'nuplo' ); ?></p>
							<?php endif; ?>
						</div>
					</div>
					<div class="search-page__posts-container--resources" id="resources">
						<div class="h2">Resources</div>
						<div class="search-page__posts">
							<?php $i = 0; ?>
							<?php
							while ( have_posts() && $i < 2 ) {
								the_post();
								?>
								<?php if ( 'post' == get_post_type() ) : ?>
									<a class="search-page__post" href="<?php the_permalink(); ?>">
										<div class="search-page__top">
											<div class="p search-page__date"><?= esc_html( get_the_date() ); ?></div>
											<div class="search-page__categories">
												<?php $categories = get_the_category(); ?>
												<?php foreach ( $categories as $category ) { ?>
													<?php
													$term_id             = $category->term_id;
													$category_background = get_field( 'color', 'term_' . $term_id );
													?>
													<object><a href="<?= esc_url( get_category_link( $term_id ) ); ?>">
															<div class="search-page__category"
																 style="background-color: <?= esc_html( $category_background ) ?>"></div>
														</a></object>
												<?php } ?>
											</div>
										</div>
										<div class="h4 search-page__post-title"><?php the_title(); ?></div>
										<div class="p search-page__read-more">
											<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
										</div>
									</a>
									<?php $i ++; ?>
								<?php endif; ?>
							<?php } ?>
							<?php if ( $i == 0 ) : ?>
								<p class="search-page__no-posts"><?php _e( 'Sorry, no posts matched your criteria.', 'nuplo' ); ?></p>
							<?php endif; ?>
						</div>
					</div>
					<div class="search-page__posts-container" id="other">
						<div class="h2 search-page__title">Other</div>
						<div class="search-page__posts">
							<?php $i = 0; ?>
							<?php
							while ( have_posts() && $i < 2 ) {
								the_post();
								?>
								<?php if ( ( 'post' != get_post_type() ) && ( 'page-product-category.php' != get_page_template_slug() ) && ( 'product' != get_post_type() ) ) : ?>
									<a class="search-page__post" href="<?php the_permalink(); ?>">
										<div>
											<div class="h4 search-page__post-title"><?php the_title(); ?></div>
											<?php if ( strlen( get_the_excerpt() ) > 200 ) : ?>
												<div class="search-page__excerpt p"><?php echo substr( get_the_excerpt(), 0, 200 ) . '...'; ?></div>
											<?php endif; ?>
										</div>
										<div class="p search-page__read-more">
											<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
										</div>
									</a>
									<?php $i ++; ?>
								<?php endif; ?>
							<?php } ?>
							<?php if ( $i == 0 ) : ?>
								<p class="search-page__no-posts"><?php _e( 'Sorry, no other posts matched your criteria.', 'nuplo' ); ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		</div>
	</div>
	<!-- Items list end -->
	</div>
</section>
