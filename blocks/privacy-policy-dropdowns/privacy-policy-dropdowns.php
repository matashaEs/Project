<?php
/**
 * $effective_date
 * $description
 * $sections [ title, description ]
 */
if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

?>

<section class="container-fluid privacy-policy-dropdowns">
	<div class="container privacy-policy-dropdowns__container">
		<div class="privacy-policy-dropdowns__content">
			<?php if ( ! empty( $effective_date ) ) : ?>
				<div class="p privacy-policy-dropdowns__date">
					<?php _e( 'Effective Date: ', 'nuplo' ); ?>
					<?= esc_html( $effective_date ); ?>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $description ) ) : ?>
				<div class="privacy-policy-dropdowns__description">
					<?= esc_html( $description ); ?>
				</div>
			<?php endif; ?>

			<?php
			if ( ! empty( $sections ) ) :
				$i = 1;
				?>
				<ul class="privacy-policy-dropdowns__contents privacy-policy-dropdowns__contents--mobile">
					<li class="h5 privacy-policy-dropdowns__menu-title"> <?php _e( 'Table of Contents ', 'nuplo' ); ?></li>
				<?php foreach ( $sections as $section ) : ?>
					<?php if ( ! empty( $section ) ) : ?>
						<li class="p-large privacy-policy-dropdowns__menu-item">
							<a href="#privacy-policy-<?= esc_html( $i ) ?>">
							<?php 
							if ( $i < 10 ) {
								echo '0' . esc_html( $i ) . '. ' . esc_html( $section['title'] );
							} else {
								echo esc_html( $i ) . '. ' . esc_html( $section['title'] );
							}
							$i += 1;
							?>
							</a>
						</li>
					<?php endif; ?>
					<?php
				endforeach;
				$i = 1;
				?>
				</ul>
				<ul class="privacy-policy-dropdowns__contents privacy-policy-dropdowns__contents--desktop">
					<div class="h5 privacy-policy-dropdowns__menu-title"> <?php _e( 'Table of Contents ', 'nuplo' ); ?></div>
					<?php foreach ( $sections as $section ) : ?>
						<?php
						if ( ! empty( $section ) ) :
							$i += 1;
							?>
							<li class="p-large privacy-policy-dropdowns__menu-item">
								<a href="#privacy-policy-<?= esc_html( $i ) ?>">
									<?= esc_html( $section['title'] ); ?>
								</a>
							</li>
						<?php endif; ?>
						<?php
					endforeach;
					$i = 1;
					?>
				</ul>

				<?php foreach ( $sections as $section ) : ?>
					<?php if ( ! empty( $section ) ) : ?>
					<div class="h5 privacy-policy-dropdowns__item-title" id="privacy-policy-<?= esc_html( $i ) ?>">
						<?= esc_html( $section['title'] ); ?>
					</div>
					<div class="privacy-policy-dropdowns__item-description">
						<?=  wp_kses(
							$section['description'],
							[
								'p'      => [ '' ],
								'strong' => [ '' ],
								'ul'     => [ '' ],
								'li'     => [ '' ],
								'br'     => [ '' ],
							]
						)
						?>
					</div>
						<?php
				endif;
					$i += 1;
					?>
			<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
