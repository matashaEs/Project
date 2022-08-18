<?php
get_header();

$index = 3;

$quick_links = [
	'container_class' => 'news__sidebar',
	'title'           => __( 'Resources', 'nuplo' ),
	'sidebar'         => [
		'mobileName' => __( 'Filters', 'nuplo' ),
		'blocks'     => [
			'selects' => [
				[
					'title'          => __( 'Industry', 'nuplo' ),
					'name'           => 'industry',
					'options'        => apply_filters( 'cai_get_industries', null ),
					'button_classes' => 'button button--off-white news__button',
				],
				[
					'title'          => 'Product',
					'name'           => 'product',
					'options'        => apply_filters( 'cai_get_products_category', null ),
					'button_classes' => 'button button--off-white news__button',
				],
				[
					'title'          => 'Content Type',
					'name'           => 'contentType',
					'options'        => apply_filters( 'cai_get_products_category', null ),
					'button_classes' => 'button button--off-white news__button',
				],
			],
		],
	],
];

$news_events_count = wp_count_posts()->publish;
$two_posts         = ( 2 == $news_events_count ) ? 'news__two-posts' : 'nie';


?>

<div class="container-fluid news <?= $two_posts ?>">
    <div class="container">
		<?php get_template_part( 'template-parts/quick-links', null, $quick_links ); ?>
		<?php if ( have_posts() ) : ?>
            <div class="row news__row">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if ( $wp_query->current_post == 0 ) { ?>
                        <a href="<?php the_permalink() ?>" class="news__a news__section">
                            <div class="news__image-section">
								<?php $url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
                                <div class="news__image"
                                     style="background-image: url( <?php echo ($url != null) ? $url : get_template_directory_uri() . '/assets/img/placeholder.jpg'; ?>);"></div>
                            </div>
                            <div class="news__content">
                                <div class="news__content--top">
                                    <div class="news__date p"><?php the_time( 'F j, Y' ) ?></div>
                                    <div class="news__categories">
										<?php $categories = get_the_category(); ?>
										<?php foreach ( $categories as $category ) { ?>
											<?php $term_id = $category->term_id;
											$color         = get_field( 'color', 'term_' . $term_id ); ?>
                                            <object><a href="<?php echo get_category_link( $term_id ) ?>">
                                                    <div class="news__category"
                                                         style="background-color: <?= $color ?>"></div>
                                                </a></object>
										<?php } ?>
                                    </div>
                                </div>
                                <div class="h4 news__title news__title--first"><?php the_title() ?></div>
                                <div class="p news__text"><?php the_excerpt() ?></div>
                                <div class="news__read-more">
									<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
                                </div>
                            </div>
                        </a>
					<?php } ?>
				<?php endwhile; ?>
                <div class="news__section-two-news">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php if ( $wp_query->current_post == 1 ) { ?>
                            <a href="<?php the_permalink() ?>" class="news__a news__content">
                                <div class="news__content--top">
                                    <div class="news__date p"><?php the_time( 'F j, Y' ) ?></div>
                                    <div class="news__categories">
										<?php $categories = get_the_category(); ?>
										<?php foreach ( $categories as $category ) { ?>
											<?php $term_id = $category->term_id;
											$color         = get_field( 'color', 'term_' . $term_id ); ?>
                                            <object><a href="<?php echo get_category_link( $category->term_id ) ?>">
                                                    <div class="news__category"
                                                         style="background-color: <?= $color ?>"></div>
                                                </a></object>
										<?php } ?>
                                    </div>
                                </div>
                                <div class="h4 news__title"><?php the_title() ?></div>
                                <div class="p news__text"><?php the_excerpt() ?></div>
                                <div class="news__read-more">
									<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
                                </div>
                            </a>
						<?php } ?>
						<?php if ( $wp_query->current_post == 2 ) { ?>
                            <a href="<?php the_permalink() ?>" class="news__a news__content">
                                <div class="news__content--top">
                                    <div class="news__date p"><?php the_time( 'F j, Y' ) ?></div>
                                    <div class="news__categories">
										<?php $categories = get_the_category(); ?>
										<?php foreach ( $categories as $category ) { ?>
											<?php $term_id = $category->term_id;
											$color         = get_field( 'color', 'term_' . $term_id ); ?>
                                            <object><a href="<?php echo get_category_link( $category->term_id ) ?>">
                                                    <div class="news__category"
                                                         style="background-color: <?= $color ?>"></div>
                                                </a></object>
										<?php } ?>
                                    </div>
                                </div>
                                <div class="h4 news__title"><?php the_title() ?></div>
                                <div class="p news__text"><?php the_excerpt() ?></div>
                                <div class="news__read-more">
									<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
                                </div>
                            </a>
						<?php } ?>
					<?php endwhile; ?>
                </div>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if ( $wp_query->current_post > 2 ) { ?>

                        <a href="<?php the_permalink() ?>"
                           class="news__a news__section news__section--small">
                            <div class="news__image-section">
								<?php $url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
                                <div class="news__image"
                                     style="background-image: url( <?php echo ($url != null) ? $url : get_template_directory_uri() . '/assets/img/placeholder.jpg'; ?>);">
                                </div>
                            </div>
                            <div class="news__content">
                                <div class="news__content--top">
                                    <div class="news__date p"><?php the_time( 'F j, Y' ) ?></div>
                                    <div class="news__categories">
										<?php $categories = get_the_category(); ?>
										<?php foreach ( $categories as $category ) { ?>
											<?php $term_id = $category->term_id;
											$color         = get_field( 'color', 'term_' . $term_id ); ?>
                                            <object><a href="<?php echo get_category_link( $category->term_id ) ?>">
                                                    <div class="news__category"
                                                         style="background-color: <?= $color ?>"></div>
                                                </a></object>
										<?php } ?>
                                    </div>
                                </div>
                                <div class="h4 news__title"><?php the_title() ?></div>
                                <div class="news__read-more">
									<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
                                </div>
                            </div>
                        </a>
					<?php } ?>
				<?php endwhile; ?>
            </div>
		<?php else: ?>
            <p class="blog__no-posts"><?php _e( "Sorry, no posts matched your criteria.", 'nuplo_theme' ) ?></p>
		<?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
