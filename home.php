<?php
get_header();

/**
 * !!!!!!!!!!!!!!!!!!! IMPORTANT !!!!!!!!!!!!!!!!!!!!!!!
 *  If you decide to change $taxonomies below, pleas also update file:
 * "wp-content\plugins\bs-llc-cai-plugin\app\domains\resources\Resources.php"
 * !!!!!!!!!!!!!!!!!!! IMPORTANT !!!!!!!!!!!!!!!!!!!!!!!
 */
$taxonomies = [];

if ( get_query_var( 'category' ) ) {
	$taxonomies['category'] = get_query_var( 'category' );
}

if ( get_query_var( 'industry' ) ) {
	$taxonomies['industry'] = get_query_var( 'industry' );
}

if ( get_query_var( 'content' ) ) {
	$taxonomies['content'] = get_query_var( 'content' );
}


$quick_links = [
	'container_class' => 'news__sidebar',
	'title'           => __( 'Resources', 'nuplo' ),
	'sidebar'         => [
		'mobileName' => __( 'Filters', 'nuplo' ),
		'blocks'     => [
			'selects' => [
				[
					'title'          => __( 'Industry', 'nuplo' ),
					'select_classes' => 'news__sidebar-industry',
					'name'           => 'industry',
					'options'        => apply_filters( 'cai_get_industries', null ),
					'button_classes' => 'button button--off-white news__button',
				],
				[
					'title'          => 'Product',
					'select_classes' => 'news__sidebar-product',
					'name'           => 'category',
					'options'        => apply_filters( 'cai_get_products_category', false ),
					'button_classes' => 'button button--off-white news__button',
				],
				[
					'title'          => 'Content Type',
					'select_classes' => 'news__sidebar-content',
					'name'           => 'content',
					'options'        => apply_filters( 'cai_get_content_types', null ),
					'button_classes' => 'button button--off-white news__button',
				],
			],
		],
	],
	'items'           => apply_filters( 'cai_get_filtered_news', $taxonomies ),
];

$news_events_count = count( $quick_links['items'] );
$two_posts         = ( 2 == $news_events_count ) ? 'news__two-posts' : '';

?>

<div class="container-fluid news <?= esc_html( $two_posts ) ?>">
	<div class="container">
		<?php get_template_part( 'template-parts/quick-links', null, $quick_links ); ?>

		<?php if ( ! empty( $quick_links['items'] ) ) : ?>
			<div class="row news__row">
				<?php if ( ! empty( $quick_links['items'][0] ) ) { ?>
					<?php $item = $quick_links['items'][0]; ?>
					<a href="<?= esc_url( $item['url'] ); ?>" class="news__a news__section">
						<div class="news__image-section">
							<?php $image_url = $item['image_url']; ?>
							<div class="news__image"
								style="background-image: url( <?= ( null != $image_url ) ? esc_url( $image_url ) : esc_url( get_template_directory_uri() ) . '/assets/img/placeholder.jpg'; ?>);"></div>
						</div>
						<div class="news__content">
							<div class="news__content--top">
								<div class="news__date p"><?= esc_html( $item['date'] ) ?></div>
								<div class="news__categories">
									<?php foreach ( $item['categories'] as $category ) { ?>
										<object><a href="<?= esc_url( $category['slug'] ) ?>">
												<div class="news__category"
													style="background-color: <?= esc_html( $category['color'] ) ?>"></div>
											</a></object>
									<?php } ?>
								</div>
							</div>
							<div class="h4 news__title news__title--first"><?=  esc_html( $item['name'] ) ?></div>
							<div class="p news__text"><?=  esc_html( $item['excerpt'] ) ?></div>
							<div class="news__read-more">
								<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
							</div>
						</div>
					</a>
				<?php } ?>
				<div class="news__section-two-news">
					<?php if ( ! empty( $quick_links['items'][1] ) ) { ?>
						<?php $item = $quick_links['items'][1]; ?>
						<a href="<?= esc_url( $item['url'] ) ?>" class="news__a news__content">
							<div class="news__content--top">
								<div class="news__date p"><?= esc_html( $item['date'] ) ?></div>
								<div class="news__categories">
									<?php foreach ( $item['categories'] as $category ) { ?>
										<object><a href="<?= esc_url( $category['slug'] ) ?>">
												<div class="news__category"
													style="background-color: <?= esc_html( $category['color'] ) ?>"></div>
											</a></object>
									<?php } ?>
								</div>
							</div>
							<div class="h4 news__title"><?=  esc_html( $item['name'] ) ?></div>
							<div class="p news__text"><?=  esc_html( $item['excerpt'] ) ?></div>
							<div class="news__read-more">
								<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
							</div>
						</a>
					<?php } ?>
					<?php if ( ! empty( $quick_links['items'][2] ) ) { ?>
						<?php $item = $quick_links['items'][2]; ?>
						<a href="<?= esc_url( $item['url'] ) ?>" class="news__a news__content">
							<div class="news__content--top">
								<div class="news__date p"><?= esc_html( $item['date'] ) ?></div>
								<div class="news__categories">
									<?php foreach ( $item['categories'] as $category ) { ?>
										<object><a href="<?= esc_url( $category['slug'] ) ?>">
												<div class="news__category"
													style="background-color: <?= esc_html( $category['color'] ) ?>"></div>
											</a></object>
									<?php } ?>
								</div>
							</div>
							<div class="h4 news__title"><?=  esc_html( $item['name'] ) ?></div>
							<div class="p news__text"><?=  esc_html( $item['excerpt'] ) ?></div>
							<div class="news__read-more">
								<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
							</div>
						</a>
					<?php } ?>
				</div>
				<?php foreach ( $quick_links['items'] as $index => $item ) : ?>
					<?php
					if ( $index > 2 ) {
						get_template_part( 'template-parts/news-posts', '', $item );
					}
					?>
				<?php endforeach; ?>
				<div class="lds-dual-ring" id="load_more"></div>
			</div>
		<?php else : ?>
			<p class="news__no-posts"><?php _e( 'Sorry, no posts matched your criteria.', 'nuplo' ); ?></p>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
