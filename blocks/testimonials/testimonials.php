<?php
/**
 * $title
 * $contents
 * $is_marks
 * $background_color [ select: 'default', 'modular--white', 'modular--off-white' ]
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

$quotes = ! empty( $is_marks ) ? '<div class="testimonials__client-quotes"></div>' : '';
?>

<?php if ( ! empty( $contents ) ) : ?>
	<section class="container-fluid testimonials modular<?= ! empty( $background_color ) ? ' ' . esc_html( $background_color ) : ''?>">
		<div class="modular__bg"></div>
		<div class="container testimonials__container">
			<div class="row testimonials__row ">
				<?php if ( ! empty( $title ) ) : ?>
					<div class="h2 testimonials__title"><?= esc_html( $title ) ?></div>
				<?php endif; ?>
			</div>
			<div class="row testimonials__row testimonials__row-content">
				<?php foreach ( $contents as $content ) : ?>
					<div class="testimonials__client modular__item">
						<?php if ( ! empty( $content['avatar'] ) ) : ?>
							<div class="testimonials__client-avatar">
								<img src="<?= esc_url( $content['avatar']['sizes']['full_hd'] ); ?>" alt="icon">
							</div>
						<?php else : ?>
							<div class="testimonials__client-avatar testimonials__client-avatar-svg">
								<?php the_svg( 'cai-logo.svg', '' ); ?>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $content['title'] ) ) : ?>
							<div class="h4 testimonials__client-name"><?= esc_html( $content['title'] ) ?></div>
						<?php endif; ?>
						<?php if ( ! empty( $content['opinion'] ) ) : ?>
							<div class="testimonials__client-opinion">
								<?= esc_html( $content['opinion'] ) ?>
							</div>
						<?php endif; ?>
						<?= wp_kses( $quotes, [ 'div' => [ 'class' => [] ] ] ) ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
