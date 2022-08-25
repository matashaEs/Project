<?php
/**
 *  $title
 *  $description
 *  $buttons [ $buttons_with_text [ $button_with_text ], $add_share_button ]
 *  image
 *  $background_color [ select: 'default', 'modular--white', 'modular--off-white' ]
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

?>

<section class="container-fluid overview-wide modular<?= ! empty( $background_color ) ? ' ' . esc_html( $background_color ) : ''?>">
	<div class="container overview-wide__container">
		<div class="overview-wide__image" style="background-image: url('<?= esc_url( $image['sizes']['full_hd'] ); ?>')">
		</div>
		<div class="overview-wide__content">
			<div class="overview-wide__path p">
				<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
			</div>
			<div class="overview-wide__heading">
				<?php if ( ! empty( $title ) ) : ?>
					<div class="overview-wide__heading-title h1">
						<?= esc_html( $title ) ?>
					</div>
				<?php endif ?>
				<?php if ( 1 == $buttons ['add_share_button'] ) : ?>
					<div class="overview-wide__button">
						<div class="button button-share overview-wide__button-share overview-wide__button-share--mobile">
							<?php the_svg( 'share-button.svg', 'product-overview__button--share' ); ?>
						</div>
					</div>
					<div class="overview-wide__share-mobile">
						<?php get_template_part( 'template-parts/share', null ); ?>
					</div>
				<?php endif ?>
			</div>
			<div class="overview-wide__description p">
				<?php if ( ! empty( $description ) ) : ?>
					<?= wp_kses( $description, [ 'br' => [ '' ] ] ) ?>
				<?php endif; ?>
			</div>
			<div class="overview-wide__buttons">
				<?php if ( ! empty( $buttons['buttons_with_text'] ) ) : ?>
					<?php
					foreach ( $buttons['buttons_with_text'] as $button ) :
						$button_with_text = $button['button_with_text'];
						?>
						<?php if ( ! empty( $button_with_text ) ) : ?>
						<a href="<?= esc_url( $button_with_text['url'] ) ?>"
						class="overview-wide__buttons-button button p"
						target=" <?= esc_attr( $button_with_text['target'] ) ?>">
							<?= esc_html( $button_with_text['title'] ) ?>
						</a>
					<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>

				<?php
				$download_page_link = apply_filters( 'cai_get_download_pade_url', null );
				if ( ! empty( $download_page_link ) && ! empty( $buttons ['add_download_button'] ) ) :
					$download_page_link .= '?category=' . get_queried_object()->slug;
					?>
					<a href="<?= esc_url( $download_page_link ) ?>" class="button p overview-wide__buttons-button">
						<?= esc_html__( 'Download Datasheet', 'nuplo' ) ?>
					</a>
				<?php endif; ?>

				<?php if ( 1 == $buttons ['add_share_button'] ) : ?>
					<div class="button button-share overview-wide__buttons-button overview-wide__button-share overview-wide__button-share--desktop">
						<?php the_svg( 'share-button.svg', 'product-overview__button--share' ); ?>
						<?php get_template_part( 'template-parts/share', null ); ?>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</section>
