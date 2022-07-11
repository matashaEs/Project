<?php
/**
 * $title
 * $description
 * $link
 * $benefits
 *  $title
 *  $description
 */

if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}
?>

<section class="container-fluid benefits">
	<div class="benefits__bg"></div>
	<div class="container benefits__container">
		<div class="row benefits__row">
			<?php if ( ! empty( $title ) || ! empty( $description ) ) : ?>
				<div class="benefits__col benefits__col--left">
					<?php if ( ! empty( $title ) ) : ?>
						<h2 class="benefits__title"><?= esc_html( $title ); ?></h2>
					<?php endif; ?>
					<?php if ( ! empty( $description ) ) : ?>
						<p class="benefits__description"><?= esc_html( $description ); ?></p>
					<?php endif; ?>
					<?php
					if ( ! empty( $link ) ) :
						?>
						<a  href="<?= esc_url( $link['url'] ); ?>"
							class="button p benefits__button"
							target="<?= esc_attr( $link['target'] ) ?>">
							<?= esc_html( $link['title'] ); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="benefits__col benefits__col--right">
				<?php if ( ! empty( $benefits ) ) : ?>
					<div class="benefits__items-container">
						<?php foreach ( $benefits as $benefit ) : ?>
							<div class="benefits__item">
								<?php if ( ! empty( $benefit['title'] ) ) : ?>
									<div class="benefits__item-title"><?= esc_html( $benefit['title'] ) ?></div>
								<?php endif; ?>
								<?php if ( ! empty( $benefit['description'] ) ) : ?>
									<p class="benefits__item-description"><?= esc_html( $benefit['description'] ) ?></p>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
