<?php
/**
 * $title [ text ]
 * $what_news [ select: 'all', 'selected' ]
 * $selected_news [ repeater; shows if 'selected' == $what_news ]
 *     $news [ Post Type Object (CPT: Post) ]
 * $link [ link ]
 * $link_position [ true/false; shows if $link is not empty ]
 * $background_color [ select: 'default', 'white', 'off-white' ]
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

$news = [
	'date'  => 'January11, 2022',
	'title' => 'CAI Software Announces Majority Investment by Symphony Technology Group (STG)',
	'link'  => 'google.com',
];

$section_background_color_class = '';

if ( ! empty( $background_color ) ) {
	if ( 'modular--white' === $background_color ) {
		$section_background_color_class = ' news-section--white modular--white';
	} elseif ( 'modular--off-white' === $background_color ) {
		$section_background_color_class = ' news-section--off-white modular--off-white';
	}
}
$button_container_class = ! empty( $link_position ) ? ' news-section__row-button--left' : '';
$how_much_news          = ! empty( $selected_news ) ? count( $selected_news ) : 3;
?>

<section class="container-fluid modular news-section<?= esc_html( $section_background_color_class ) ?>">
	<div class="modular__bg news-section__bg"></div>
	<div class="container news-section__container">
		<div class="row news-section__row news-section__row-title">
			<?php if ( ! empty( $title ) ) : ?>
				<div class="h2 news-section__title news-section__title--desktop"><?= esc_html( $title ); ?></div>
				<a href="<?= esc_url( $link['url'] ) ?>" class="news-section__title-link">
					<div class="h2 news-section__title"><?= esc_html( $title ); ?></div>
				</a>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $news ) ) : ?>
			<div class="row news-section__row news-section__row-news">
				<?php for ( $i = 0; $i < $how_much_news; $i++ ) : ?>
					<a href="<?= esc_url( $news['link'] ); ?>"
						class="news-section__item modular__item modular__item--mobile">
						<div class="news-section__item-top-content">
							<?php if ( ! empty( $news['date'] ) ) : ?>
								<div class="p news-section__item-date"><?= esc_html( $news['date'] ); ?></div>
							<?php endif; ?>
							<div class="news-section__item-categories">
								<div class="news-section__item-category"></div>
								<div class="news-section__item-category"></div>
							</div>
						</div>
						<?php if ( ! empty( $news['title'] ) ) : ?>
							<div class="h4 news-section__item-title"><?= esc_html( $news['title'] ); ?></div>
						<?php endif; ?>
						<?php if ( ! empty( $news['link'] ) ) : ?>
							<div class="p news-section__item-read-more">
								<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
							</div>
						<?php endif; ?>
					</a>
				<?php endfor; ?>
			</div>
		<?php endif; ?>
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
