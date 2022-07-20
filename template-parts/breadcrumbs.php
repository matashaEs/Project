<?php
if ( empty( $args ) ) {
	$args = [];
}
?>

<div class="breadcrumbs">
	<?php
	$items_count = count( $args );
	$i           = 0;
	foreach ( $args as $breadcrumb ) :
		if ( ++ $i < $items_count ) :
			?>
			<a href="<?= esc_url( $breadcrumb['url'] ); ?>" class="breadcrumbs__item breadcrumbs__item--link">
				<?= esc_html( $breadcrumb['name'] ); ?>
			</a>
			<?php
		else :
			?>
			<div class="breadcrumb">
				<?= esc_html( $breadcrumb['name'] ); ?>
			</div>
			<?php
		endif;
	endforeach;
	?>
</div>
