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
			<div class=" search-page">
				<?php if ( ! empty( $sidebar['blocks']['navigation'] ) ) : ?>
					<?php if ( ! empty( $search_results['products'] ) ) : ?>
						<?php $i = 0; ?>
						<div class="search-page__posts-container" id="products">
							<div class="search-page__top">
								<div class="h2 search-page__title">Products</div>
								<a href="<?= esc_url( apply_filters( 'cai_browse_by_product_url', null ) ) ?>" class="button search-page__button">
									<?= esc_html( __( 'See All Products', 'nuplo' ) ) ?>
								</a>
							</div>
							<div class="search-page__posts">
								<?php foreach ( $search_results['products'] as $product ) { ?>
									<a class="search-page__post" href="<?= esc_url( $product['url'] ) ?>">
										<div>
											<div class="h4  search-page__post-title"><?= esc_html( $product['name'] ) ?></div>
											<?php if ( strlen( $product['description'] ) > 200 ) : ?>
												<div class="search-page__excerpt p"><?= esc_html( substr( $product['description'], 0, 200 ) ) . '...' ?></div>
											<?php else : ?>
												<div class="search-page__excerpt p"><?= esc_html( $product['description'] ) ?></div>
											<?php endif; ?>
										</div>
										<div class="p search-page__read-more">
											<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
										</div>
									</a>
									<?php
									if ( 2 == ++ $i ) {
										break;
									}
									?>
								<?php } ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $search_results['categories'] ) ) : ?>
						<?php $i = 0; ?>
						<div class="search-page__posts-container" id="categories">
							<div class="search-page__top">
								<div class="h2 search-page__title">Categories</div>
								<a href="<?= esc_url( apply_filters( 'cai_browse_by_product_url', null ) ) ?>" class="button search-page__button">
									<?= esc_html( __( 'See All Categories', 'nuplo' ) ) ?>
								</a>
							</div>
							<div class="search-page__posts">
								<?php foreach ( $search_results['categories'] as $category ) { ?>
									<a class="search-page__post" href="<?= esc_url( $category['url'] ) ?>">
										<div>
											<div class="h4 search-page__post-title"><?= esc_html( $category['name'] ) ?></div>
											<?php if ( strlen( $category['description'] ) > 200 ) : ?>
												<div class="search-page__excerpt p"><?= esc_html( substr( $category['description'], 0, 200 ) ) . '...' ?></div>
											<?php else : ?>
												<div class="search-page__excerpt p"><?= esc_html( $category['description'] ) ?></div>
											<?php endif; ?>
										</div>
										<div class="p search-page__read-more">
											<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
										</div>
									</a>
									<?php
									if ( 2 == ++ $i ) {
										break;
									}
									?>
								<?php } ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $search_results['resources'] ) ) : ?>
						<?php $i = 0; ?>
						<div class="search-page__posts-container--resources" id="resources">
							<div class="search-page__top">
								<div class="h2 search-page__title">Resources</div>
								<a href="<?= esc_url( site_url( '/resources/' ) ) ?>" class="button search-page__button">
									<?= esc_html( __( 'Resources', 'nuplo' ) ) ?>
								</a>
							</div>
							<div class="search-page__posts">
								<?php foreach ( $search_results['resources'] as $resource ) { ?>
									<a class="search-page__post" href="<?= esc_url( $resource['url'] ) ?>">
										<div>
											<div class="search-page__top">
												<div class="p search-page__date"><?= esc_html( $resource['date'] ); ?></div>
												<div class="search-page__categories">
													<?php foreach ( $resource['categories'] as $category ) { ?>
														<object><a href="<?= esc_url( $category['slug'] ) ?>">
																<div class="search-page__category"
																	style="background-color: <?= esc_html( $category['color'] ) ?>"></div>
															</a></object>
													<?php } ?>
												</div>
											</div>
											<div class="h4 search-page__post-title"><?= esc_html( $resource['name'] ) ?></div>
										</div>
										<div class="p search-page__read-more">
											<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
										</div>
									</a>
									<?php
									if ( 4 == ++ $i ) {
										break;
									}
									?>
								<?php } ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $search_results['other'] ) ) : ?>
						<?php $i = 0; ?>
						<div class="search-page__posts-container" id="other">
							<div class="h2 search-page__title">Other</div>
							<div class="search-page__posts">
								<?php foreach ( $search_results['other'] as $other ) { ?>
									<a class="search-page__post" href="<?= esc_url( $other['url'] ) ?>">
										<div>
											<div class="h4 search-page__post-title"><?= esc_html( $other['name'] ) ?></div>
											<?php if ( strlen( $other['description'] ) > 200 ) : ?>
												<div class="search-page__excerpt p"><?= esc_html( substr( $other['description'], 0, 200 ) ) . '...' ?></div>
											<?php else : ?>
												<div class="search-page__excerpt p"><?= esc_html( $other['description'] ) ?></div>
											<?php endif; ?>
										</div>
										<div class="p search-page__read-more">
											<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
										</div>
									</a>
									<?php
									if ( 2 == ++ $i ) {
										break;
									}
									?>
								<?php } ?>
							</div>
						</div>
					<?php endif; ?>
				<?php else : ?>
					<div class="h4 search-page__no-posts"><?php _e( 'Sorry, no search results matched your criteria.', 'nuplo' ); ?></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
	<!-- Items list end -->
	</div>
</section>
