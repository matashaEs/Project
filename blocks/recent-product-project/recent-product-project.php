<?php
/**
 *  $title
 *  $project [ title, description, link, image ]
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}
?>

<?php if ( ! empty( $project ) ) : ?>
	<section class="container-fluid recent-product-project">
		<div class="container">
			<?php if ( ! empty( $title ) ) : ?>
				<div class="row h2 recent-product-project__title"><?= esc_html( $title ) ?></div>
			<?php endif; ?>
			<div class="row recent-product-project__project">
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
					<img src="<?= esc_url( $project['image']['sizes']['full_hd'] ); ?>" alt="project_image"
						class="recent-product-project__project-image">
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
