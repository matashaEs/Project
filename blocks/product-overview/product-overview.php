<?php
/**
 *  $image
 *  $title
 *  $description
 *  $buttons[ $buttons_with_text[ $button_with_text ], $add_share_button ]
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}
?>

<section class="container-fluid product-overview">
	<?php if ( ! empty( $image ) || get_the_post_thumbnail_url() ) : ?>
	<div class="product-overview__bg" style="background-image: url( '<?= ! empty( $image ) ? esc_url( $image['sizes']['full_hd'] ) : esc_url( get_the_post_thumbnail_url() ); ?> ' )">
	</div>
	<?php endif; ?>
	<div class="product-overview__path">
		<p> Products > ERP > Ponderosa ERP </p>
	</div>
	<div class="product-overview__title product-overview__title--mobile">
		<h1> <?= esc_html( the_title() )?></h1>
	</div>
	<div class="product-overview__title product-overview__title--desktop">
		<h3> <?= esc_html( $title )?></h3>
	</div>
	<?php if ( ! empty( $description ) ) : ?>
		<div class="product-overview__description">
			<p> <?= wp_kses( $description, [ 'br' => [] ] )?></p>
		</div>
	<?php endif ?>
	<div class="product-overview__buttons">
		<?php if ( ! empty( $buttons['buttons_with_text'] ) ) : ?>
			<?php 
			foreach ( $buttons['buttons_with_text'] as $button ) :
				$button_with_text = $button['button_with_text'];
				?>
				<?php if ( ! empty( $button_with_text ) ) : ?>
				<a href="<?= esc_url( $button_with_text['url'] ) ?>" class="button p">
					<?= esc_html( $button_with_text['title'] )?>
				</a>
			<?php endif; ?>
		<?php endforeach; ?>
		<?php endif; ?>
		<?php if ( 1 == $buttons ['add_share_button'] ) : ?>
		<a href="" class="button product-overview__button-share"> <?php the_svg( 'share-button.svg', 'product-overview-share' ); ?></a>
		<?php endif; ?>
	</div>
</section>
