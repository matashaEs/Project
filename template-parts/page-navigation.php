<?php
/**
 * $navigation_links
 *  $title
 *  block_id
 */

extract( $args );
?>

<div class="page-navigation">
	<?php foreach ( $navigation_links as $navigation_link ) : ?>
		<a
				href="#<?= esc_html( $navigation_link['block_id'] ) ?>"
				class="button button--off-white page-navigation__button"
				data-block-id="<?= esc_attr( $navigation_link['block_id'] ) ?>"
		>
			<?= esc_html( $navigation_link['name'] ) ?>
		</a>
	<?php endforeach; ?>
</div>
