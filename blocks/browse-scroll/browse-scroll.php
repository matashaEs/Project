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
?>

<section class="container-fluid">
	<div class="container">
		<div class="row browse-scroll browse-scroll--right">
			<div class="browse-scroll__description">
				<div class="browse-scroll__description-bg"></div>
				<h2 class="browse-scroll__description-text">
					<?= esc_html( $list_title ); ?>
				</h2>
			</div>

			<div class="browse-scroll__items">
				<?php foreach ( $items as $item ) : ?>
					<a href="<?= esc_url( $item['url'] ); ?>" class="browse-scroll__item">
						<div class="browse-scroll__item-bg" style="background-image: url('<?= esc_html( $item['background'] ); ?>');"></div>
						<div class="button button--white"><?= esc_html( $item['name'] ); ?></div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
