<?php
/**
 *  $title
 *  $project [ title, description, link, image ]
 *  $background_color [ select: 'default', 'modular--white', 'modular--off-white' ]
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}
?>

<?php if ( ! empty( $project ) ) : ?>
	<section class="container-fluid recent-product-project modular<?= ! empty( $background_color ) ? ' ' . esc_html( $background_color ) : ''?>">
		<div class="modular__bg"></div>
		<div class="container">
			<?php if ( ! empty( $title ) ) : ?>
				<div class="row h2 recent-product-project__title"><?= esc_html( $title ) ?></div>
			<?php endif; ?>
			<div class="row recent-product-project__project modular__item--no-mobile">
				<div class="recent-product-project__project-content">
					<?php if ( ! empty( $project['title'] ) ) : ?>
						<div class="h3 recent-product-project__project-title">
							<?= esc_html( $project['title'] ) ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $project['description'] ) ) : ?>
						<div class="p recent-product-project__project-description">
							<?= esc_html( $project['description'] ) ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $project['link'] ) ) : ?>
						<a href="<?= esc_url( $project['link']['url'] ) ?>"
							class="button recent-product-project__project-button">
							<?= esc_html( $project['link']['title'] ) ?>
						</a>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $project['image'] ) ) : ?>
					<div class="recent-product-project__project-image"
						style="background-image: url('<?= esc_url( $project['image']['sizes']['full_hd'] ); ?>')"></div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
