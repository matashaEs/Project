<?php
$browse_by = '';


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

if ( 'industry' === $browse_by ) {
	$list_title = __( 'Browse by Industry', 'nuplo' );
	$items      = apply_filters( 'cai_get_industries', null );
} else {
	$list_title = __( 'Browse by Product', 'nuplo' );
	$items      = apply_filters( 'cai_get_products', null );
}

$section_classes  = ! empty( $is_mobile_bg ) ? ' browse-scroll--mobile-bg' : '';
$section_classes .= ! empty( $direction ) ? ' browse-scroll--reverse' : '';
?>

<section class="container-fluid browse-scroll<?= esc_html( $section_classes ) ?>">
	<div class="container">
		<div class="row browse-scroll__row">
			<div class="browse-scroll__description">
				<div class="browse-scroll__description-bg"></div>
				<a class="browse-scroll__description-link h2" href="#">
					<?= esc_html( $list_title ); ?>
				</a>
			</div>

			<div class="browse-scroll__items">
				<div class="browse-scroll__items-list">
					<?php foreach ( $items as $item ) : ?>
						<div class="browse-scroll__item">
							<div class="browse-scroll__item-bg"
								style="background-image: url('<?= esc_html( $item['background'] ); ?>');"></div>
							<a href="<?= esc_url( $item['url'] ); ?>"
								class="button button--white browse-scroll__button">
								<?= esc_html( $item['name'] ); ?>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
