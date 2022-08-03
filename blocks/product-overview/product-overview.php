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

$current_post_url = get_permalink();
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
		<h1> <?= esc_html( the_title() ) ?></h1>
	</div>
	<div class="product-overview__title product-overview__title--desktop">
		<h3> <?= esc_html( $title ) ?></h3>
	</div>
	<?php if ( ! empty( $description ) ) : ?>
		<div class="product-overview__description">
			<p> <?= wp_kses( $description, [ 'br' => [] ] ) ?></p>
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
					<?= esc_html( $button_with_text['title'] ) ?>
				</a>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php if ( 1 == $buttons ['add_share_button'] ) : ?>
			<div class="button product-overview__button-share"> <?php the_svg( 'share-button.svg', 'product-overview-share' ); ?></div>
				<div class="product-overview__share">
					<div class="product-overview__share-heading p-large">
						Share
					</div>
					<div class="product-overview__share-option">
						<a href="<?= 'http://www.linkedin.com/shareArticle?mini=true&url=' . esc_url( $current_post_url ) ?>" class="product-overview__share-option--link">
							<img src="<?= esc_url( get_template_directory_uri() . '/assets/img/share-linkedin.svg' ) ?>"
								alt="CAI icon"> <p class="p-large product-overview__share-option--text"> Linkedin </p>
						</a>
					</div>
					<div class="product-overview__share-option">
						<a href="<?= 'http://www.facebook.com/sharer.php?u=' . esc_url( $current_post_url ) ?>" class="product-overview__share-option--link">
							<img src="<?= esc_url( get_template_directory_uri() . '/assets/img/share-facebook.svg' ) ?>"
								alt="CAI icon"> <p class="p-large product-overview__share-option--text"> Facebook </p>
						</a>
					</div>
					<div class="product-overview__share-option">
						<a href="<?= 'mailto:?Subject=Arcadia Towers&Body=' . esc_url( $current_post_url ) ?>" class="product-overview__share-option--link">
							<img src="<?= esc_url( get_template_directory_uri() . '/assets/img/share-email.svg' ) ?>"
								alt="CAI icon"> <p class="p-large product-overview__share-option--text"> Email </p>
						</a>
					</div>
					<div class="product-overview__share-option">
						<div class="product-overview__share-option--link product-overview__share-option--copy">
							<img src="<?= esc_url( get_template_directory_uri() . '/assets/img/share-copy-link.svg' ) ?>"
								alt="CAI icon"> <p class="p-large product-overview__share-option--text"> Copy Link </p>
						</div>
					</div>
				</div>
			<div class="product-overview__snackText">
				<?php _e( "The website's address is copied...", 'nuplo' ); ?>
			</div>

		<?php endif; ?>
	</div>
</section>
