<?php
/**
 *  $image
 *  $title
 *  $description
 *  $buttons[ $buttons_with_text[ $button_with_text ], $add_share_button ]
 *  $background_color [ select: 'default', 'modular--white', 'modular--off-white' ]
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

$breadcrumbs = [
	[
		'name' => __( 'Products', 'nuplo' ),
		'url'  => get_home_url(),
	],
	[
		'name' => __( 'ERP', 'nuplo' ),
		'url'  => '#',
	],
	[
		'name' => __( 'Ponderosa ERP', 'nuplo' ),
		'url'  => '#',
	],
]
?>

<section class="container-fluid product-overview modular<?= ! empty( $background_color ) ? ' ' . esc_html( $background_color ) : ''?>">
	<?php if ( ! empty( $image ) || get_the_post_thumbnail_url() ) : ?>
		<div class="product-overview__bg"
			style="background-image: url( '<?= ! empty( $image ) ? esc_url( $image['sizes']['full_hd'] ) : esc_url( get_the_post_thumbnail_url() ); ?> ' )"></div>
	<?php endif; ?>
	<div class="container">
		<div class="product-overview__path">
			<?php get_template_part( 'template-parts/breadcrumbs', null, $breadcrumbs ); ?>
		</div>
		<div class="product-overview__title product-overview__title--mobile">
			<h1><?= esc_html( the_title() ) ?></h1>
		</div>
		<div class="product-overview__title product-overview__title--desktop">
			<h3><?= esc_html( $title ) ?></h3>
		</div>
		<?php if ( ! empty( $description ) ) : ?>
			<div class="product-overview__description">
				<p> <?= wp_kses( $description, [ 'br' => [] ] ) ?></p>
			</div>
		<?php endif ?>
		<div class="product-overview__buttons">
			<?php
			if ( ! empty( $buttons['buttons_with_text'] ) ) :
				foreach ( $buttons['buttons_with_text'] as $button ) :
					$button_with_text = $button['button_with_text'];
					if ( ! empty( $button_with_text ) ) :
						?>
						<a href="<?= esc_url( $button_with_text['url'] ) ?>" class="button p">
							<?= esc_html( $button_with_text['title'] ) ?>
						</a>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
			<?php if ( 1 == $buttons ['add_share_button'] ) : ?>
				<div class="button button-share product-overview__button-share"> <?php the_svg( 'share-button.svg', 'product-overview-share' ); ?></div>
				<?php get_template_part( 'template-parts/share', null ); ?>
			<?php endif; ?>
		</div>
	</div>
</section>
