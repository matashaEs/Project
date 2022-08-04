<?php
$current_post_url = get_permalink();
?>

<div class="share">
	<div class="share__heading p-large">
		Share
	</div>
	<div class="share__option">
		<a href="<?= 'http://www.linkedin.com/shareArticle?mini=true&url=' . esc_url( $current_post_url ) ?>"
				class="share__option-link">
			<img src="<?= esc_url( get_template_directory_uri() . '/assets/img/share-linkedin.svg' ) ?>"
				alt="CAI icon">
			<p class="p-large share__option-text"> <?php _e( 'Linkedin', 'nuplo' ); ?> </p>
		</a>
	</div>
	<div class="share__option">
		<a href="<?= 'http://www.facebook.com/sharer.php?u=' . esc_url( $current_post_url ) ?>"
				class="share__option-link">
			<img src="<?= esc_url( get_template_directory_uri() . '/assets/img/share-facebook.svg' ) ?>"
				alt="CAI icon">
			<p class="p-large share__option-text"> <?php _e( 'Facebook', 'nuplo' ); ?> </p>
		</a>
	</div>
	<div class="share__option">
		<a href="<?= 'mailto:?Subject=Arcadia Towers&Body=' . esc_url( $current_post_url ) ?>"
				class="share__option-link">
			<img src="<?= esc_url( get_template_directory_uri() . '/assets/img/share-email.svg' ) ?>"
				alt="CAI icon">
			<p class="p-large share__option-text"> <?php _e( 'Email', 'nuplo' ); ?> </p>
		</a>
	</div>
	<div class="share__option">
		<div class="share__option-link share__option-copy">
			<img src="<?= esc_url( get_template_directory_uri() . '/assets/img/share-copy-link.svg' ) ?>"
				alt="CAI icon">
			<p class="p-large share__option-text"> <?php _e( 'Copy Link', 'nuplo' ); ?> </p>
		</div>
	</div>
	<div class="share__snackText">
		<?php _e( "The website's address is copied...", 'nuplo' ); ?>
	</div>
</div>
