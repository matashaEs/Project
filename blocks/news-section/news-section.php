<?php
/**
 * $title [ text ]
 * $title_mobile [ text ]
 * $what_news [ select: 'all', 'category' ]
 * $category [ group; shows if 'category' == $what_news ]
 *     $product_category [ taxonomy ]
 *     $product_industry [ taxonomy ]
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
$item_class                 = ! empty( $color_pallet ) && 'grey' == $color_pallet ? ' news-section__item--off-white' : '';
$button_container_class     = ! empty( $link_position ) ? ' news-section__row-button--left' : '';
$how_many                   = ! empty( $what_news ) && 'category' == $what_news ? 2 : 3;

?>

<section class="container-fluid news-section<?= esc_html( $section_color_pallet_class ) ?>">
	<div class="news-section__bg"></div>
	<div class="container news-section__container">
		<div class="row news-section__row news-section__row-title">
			<?php if ( ! empty( $title ) ) : ?>
				<h2 class="news-section__title<?= empty( $title_mobile ) ? esc_html( 'news-section__title--no-mobile' ) : ''?>">
					<?= esc_html( $title ); ?>
				</h2>
				<?php if ( ! empty( $title_mobile ) ) : ?>
				<h2 class="news-section__title--mobile"><?= esc_html( $title_mobile ); ?></h2>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $news ) ) : ?>
			<div class="row news-section__row news-section__row-news">
				<?php for ( $i = 0; $i < $how_many; $i++ ) : ?>
					<div class="news-section__item <?= esc_html( $item_class ) ?>">
						<div class="news-section__item-top-content">
							<?php if ( ! empty( $news['date'] ) ) : ?>
								<p class="news-section__item-date"><?= esc_html( $news['date'] ); ?></p>
							<?php endif; ?>
							<div class="news-section__item-categories">
								<div class="news-section__item-category"></div>
								<div class="news-section__item-category"></div>
							</div>
						</div>
						<?php if ( ! empty( $news['title'] ) ) : ?>
							<h4 class="news-section__item-title"><?= esc_html( $news['title'] ); ?></h4>
						<?php endif; ?>
						<?php if ( ! empty( $news['link'] ) ) : ?>
							<a  href="<?= esc_url( $news['link'] ); ?>"
								class="p news-section__item-button">
									<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endfor; ?>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $link ) ) : ?>
			<div class="row news-section__row news-section__row-button <?= esc_html( $button_container_class ) ?>">
				<a href="<?= esc_url( $link['url'] ) ?>"
					class="button news-section__button">
					<?= esc_html( $link['title'] ) ?>
				</a>
			</div>
		<?php endif; ?>

	</div>
</section>
