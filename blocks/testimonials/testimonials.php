<?php
/**
 * $title
 * $contents
 * $is_marks
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}

$quotes = ! empty( $is_marks ) ? '<div class="testimonials__client-quotes"></div>' : '';
// var_dump($quotes, '!!!');
?>

<?php if ( ! empty( $contents ) ) : ?>
	<section class="container-fluid testimonials">
		<div class="container testimonials__container">
			<div class="row testimonials__row ">
				<?php if ( ! empty( $title ) ) : ?>
					<h2 class="testimonials__title"><?= esc_html( $title ) ?></h2>
				<?php endif; ?>
			</div>
			<div class="row testimonials__row testimonials__row-content">
				<?php foreach ( $contents as $content ) : ?>
					<div class="testimonials__client">
						<?php if ( ! empty( $content['avatar'] ) ) : ?>
							<div class="testimonials__client-avatar">
								<img src="<?= esc_url( $content['avatar']['sizes']['full_hd'] ); ?>" alt="icon">
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
