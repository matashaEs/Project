<?php
/**
 * $title [ text ]
 * $what_news [ select: 'all', 'selected' ]
 * $selected_news [ repeater; shows if 'selected' == $what_news ]
 *     $news [ Post Type Object (CPT: Post) ]
 * $link [ link ]
 * $link_position [ true/false; shows if $link is not empty ]
 * $color_pallet [ select: 'grey', 'off-white' ]
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

$section_color_pallet_class = ! empty( $color_pallet ) && 'grey' == $color_pallet ? ' news-section--grey' : '';
$bg_color_pallet_class      = ! empty( $color_pallet ) && 'grey' == $color_pallet ? ' news-section__bg--grey' : '';
$item_class                 = ! empty( $color_pallet ) && 'grey' == $color_pallet ? ' news-section__item--off-white' : '';
$button_container_class     = ! empty( $link_position ) ? ' news-section__row-button--left' : '';
$how_much_news              = ! empty( $selected_news ) ? count( $selected_news ) : 3;
?>

<section class="container-fluid news-section<?= esc_html( $section_color_pallet_class ) ?>">
	<div class="news-section__bg<?= esc_html( $bg_color_pallet_class ) ?>"></div>
	<div class="container news-section__container">
		<div class="row news-section__row news-section__row-title">
			<?php if ( ! empty( $title ) ) : ?>
				<div class="h2 news-section__title"><?= esc_html( $title ); ?></div>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $news ) ) : ?>
			<div class="row news-section__row news-section__row-news">
				<?php for ( $i = 0; $i < $how_much_news; $i++ ) : ?>
					<a href="<?= esc_url( $news['link'] ); ?>" class="news-section__item <?= esc_html( $item_class ) ?>">
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
			<div class="row news-section__row news-section__row--button <?= esc_html( $button_container_class ) ?>">
				<a
						href="<?= esc_url( $link['url'] ) ?>"
						class="button news-section__button">
					<?= esc_html( $link['title'] ) ?>
				</a>
			</div>
		<?php endif; ?>

	</div>
</section>
