<?php
/**
 * $title [ text ]
 * $what_news [ select: 'all', 'category', 'selected' ]
 * $selected_news [ repeater; shows if 'selected' == $what_news ]
 *     $news [ Post Type Object (CPT: Post) ]
 * $categories [taxonomy; shows if 'category' == $what_news ]
 * $link [ link ]
 * $link_position [ true/false; shows if $link is not empty ]
 * $background_color [ select: 'default', 'modular--white', 'modular--off-white' ]
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

$i = 0;

$section_background_color_class = '';

if ( ! empty( $background_color ) ) {
	if ( 'modular--white' === $background_color ) {
		$section_background_color_class = ' news-section--white modular--white';
	} elseif ( 'modular--off-white' === $background_color ) {
		$section_background_color_class = ' news-section--off-white modular--off-white';
	}
}
$button_container_class = ! empty( $link_position ) ? ' news-section__row-button--left' : '';

if ( is_single() && 'product' == get_post_type() ) {
	$how_much_news = 2;
} else {
	$how_much_news = 3;
}
?>

<section class="container-fluid news-section modular<?= esc_html( $section_background_color_class ) ?>">
	<div class="container news-section__container">
		<div class="row news-section__row news-section__row-title">
			<?php if ( ! empty( $title ) ) : ?>
				<div class="h2 news-section__title news-section__title--desktop"><?= esc_html( $title ); ?></div>
				<?php if ( ! empty( $link && $link['url'] ) ) : ?>
					<a href="<?= esc_url( $link['url'] ) ?>" class="h2 news-section__title news-section__title--link">
						<?= esc_html( $title ); ?>
					</a>
				<?php else : ?>
					<div class="h2 news-section__title "><?= esc_html( $title ); ?></div>
				<?php endif; ?>
				<?php if ( is_single() && 'product' == get_post_type() && ! empty( $link ) ) : ?>
					<a href="<?= esc_url( $link['url'] ) ?>" class="button news-section__button">
						<?= esc_html( $link['title'] ) ?>
					</a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="row news-section__row news-section__row-news">
			<?php if ( ! empty( $selected_news ) ) : ?>
				<?php $news_posts = apply_filters( 'cai_get_selected_news', $selected_news ); ?>
			<?php elseif ( ! empty( $categories ) ) : ?>
				<?php $category = get_term( $categories )->slug; ?>
				<?php $news_posts = apply_filters( 'cai_get_filtered_news', $category ); ?>
			<?php else : ?>
				<?php $news_posts = apply_filters( 'cai_get_filtered_news', null ); ?>
			<?php endif; ?>
			<?php if ( ! empty( $news_posts ) ) : ?>
				<?php foreach ( $news_posts as $news_post ) { ?>
					<a href="<?= esc_url( $news_post['url'] ); ?>"
						class="news-section__item modular__item--mobile">
						<div class="news-section__item-top-content">
							<div class="p news-section__item-date"><?= esc_html( $news_post['date'] ); ?></div>
							<div class="news__categories">
								<?php foreach ( $news_post['categories'] as $category ) { ?>
									<object><a href="<?= esc_url( $category['slug'] ) ?>">
											<div class="news__category"
												style="background-color: <?= esc_html( $category['color'] ) ?>"></div>
										</a></object>
								<?php } ?>
							</div>
						</div>
						<div class="h4 news-section__item-title"><?= esc_html( $news_post['name'] ); ?></div>
						<div class="p news-section__item-read-more">
							<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
						</div>
					</a>
					<?php
					if ( ++ $i == $how_much_news ) {
						break;
					}
					?>
				<?php } ?>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $link ) ) : ?>
			<div class="row news-section__row news-section__row-button <?= esc_html( $button_container_class ) ?>">
				<a
						href="<?= esc_url( $link['url'] ) ?>"
						class="button news-section__button">
					<?= esc_html( $link['title'] ) ?>
				</a>
			</div>
		<?php endif; ?>

	</div>
</section>
