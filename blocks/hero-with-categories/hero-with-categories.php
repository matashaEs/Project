<?php
/**
 *  $title
 *  $image
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

?>

<section class="container-fluid hwc">
	<div class="hwc__image">
		<img src="<?= esc_url( $image['sizes']['full_hd'] ); ?>" class="hwc__image-mobile">
	</div>
	<div class="hwc__bg" style="background-image: url('<?= esc_url( $image['sizes']['full_hd'] ); ?>')"></div>
	<div class="container hwc__container">
		<div class="hwc__content">
			<div class="hwc__breadcrumbs p">
<!--				--><?php //get_template_part( 'template-parts/breadcrumbs' ); ?>
			</div>
			<?php if ( ! empty( $title ) ) : ?>
				<div class="hwc__title">
					<?= esc_html( $title ) ?>
				</div>
			<?php endif; ?>
			<div class="hwc__row">
				<div class="hwc__date">
					<?= get_the_date(); ?>
				</div>
				<div class="hwc__categories">
					Category
				</div>
			</div>
		</div>
	</div>
</section>
