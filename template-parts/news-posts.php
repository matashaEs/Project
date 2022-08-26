<a href="<?= esc_url( $args['url'] ) ?>"
	class="news__a news__section news__section--small">
	<div class="news__image-section">
		<div class="news__image"
			style="background-image: url( <?= ( null != $args['image_url'] ) ? esc_url( $args['image_url'] ) : esc_url( get_template_directory_uri() ) . '/assets/img/placeholder.jpg'; ?>);"></div>
	</div>
	<div class="news__content">
		<div class="news__content--top">
			<div class="news__date p"><?= esc_html( $args['date'] ) ?></div>
			<div class="news__categories">
				<?php foreach ( $args['categories'] as $category ) { ?>
					<object><a href="<?= esc_url( $category['slug'] ) ?>">
							<div class="news__category"
								style="background-color: <?= esc_html( $category['color'] ) ?>"></div>
						</a></object>
				<?php } ?>
			</div>
		</div>
		<div class="h4 news__title"><?= esc_html( $args['name'] ) ?></div>
		<div class="news__read-more">
			<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
		</div>
	</div>
</a>

