<?php
/**
 * $navigation_links
 *  $title
 *  $link
 */

extract( $args );
?>

<div class="page-navigation">
	<?php foreach ( $navigation_links as $navigation_link ) : ?>
		<a href="<?= esc_url( $navigation_link['link'] ) ?>" class="button button--off-white page-navigation__button">
			<?= esc_html( $navigation_link['title'] ) ?>
		</a>
	<?php endforeach; ?>
</div>
