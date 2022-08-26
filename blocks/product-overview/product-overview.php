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

?>

<section class="container-fluid product-overview modular<?= ! empty( $background_color ) ? ' ' . esc_html( $background_color ) : ''?>">
	<?php if ( ! empty( $image ) || get_the_post_thumbnail_url() ) : ?>
		<div class="product-overview__bg"
			style="background-image: url( '<?= ! empty( $image ) ? esc_url( $image['sizes']['full_hd'] ) : esc_url( get_the_post_thumbnail_url() ); ?> ' )"></div>
	<?php endif; ?>
	<div class="container">
		<div class="product-overview__path">
			<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
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

			<?php
			$download_page_link = apply_filters( 'cai_get_download_pade_url', null );
			if (
					! empty( $download_page_link ) &&
					! empty( $buttons ['add_download_datasheet_button'] ) &&
					! empty( get_field( 'download_form_guid', get_the_ID() ) ) &&
					! empty( get_field( 'datasheet_file', get_the_ID() ) )
			) :
				$download_page_link .= '?download-product=' . get_post( get_the_ID() )->post_name;
				?>
				<a href="<?= esc_url( $download_page_link ) ?>" class="button p">
					<?= esc_html__( 'Download Datasheet', 'nuplo' ) ?>
				</a>
			<?php endif; ?>

			<?php if ( 1 == $buttons ['add_share_button'] ) : ?>
				<div class="button button-share product-overview__button-share"> <?php the_svg( 'share-button.svg', 'product-overview-share' ); ?></div>
				<?php get_template_part( 'template-parts/share' ); ?>
			<?php endif; ?>
		</div>
	</div>
</section>
