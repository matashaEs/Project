<?php
/**
 * $title
 * $description
 * $contents [ title, description ]
 * $image
 */
if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

?>

<section class="container-fluid overview-with-dropdowns">
	<div class="container overview-with-dropdowns__container">
		<div class="overview-with-dropdowns__image" style="background-image: url('<?= esc_url( $image['sizes']['full_hd'] ); ?>')"></div>
		<div class="overview-with-dropdowns__content">

			<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

			<?php if ( ! empty( $title ) ) : ?>
				<div class="h1 overview-with-dropdowns__title"><?= esc_html( $title ); ?></div>
			<?php endif; ?>

			<?php if ( ! empty( $description ) ) : ?>
				<div class="p overview-with-dropdowns__description"><?= wp_kses( $description, [ 'br' => [ '' ] ] ) ?></div>
			<?php endif; ?>

			<?php if ( ! empty( $contents ) ) : ?>
				<ul class="overview-with-dropdowns__dropdowns">
					<?php foreach ( $contents as $dropdown ) : ?>
						<?php if ( ! empty( $dropdown ) ) : ?>
							<li class="overview-with-dropdowns__item">
								<?php if ( ! empty( $dropdown['title'] ) ) : ?>
									<?= esc_html( $dropdown['title'] ) ?>
								<?php endif; ?>
								<?php if ( ! empty( $dropdown['description'] ) ) : ?>
									<div class="overview-with-dropdowns__item-description-container">
										<div class="p overview-with-dropdowns__item-description">
											<?= esc_html( $dropdown['description'] ) ?>
										</div>
									</div>
								<?php endif; ?>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

		</div>
	</div>
</section>
