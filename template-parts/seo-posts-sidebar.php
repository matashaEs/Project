<?php
/**
 * $title
 * $link
 * $links
 */

extract( $args );
?>
<div class="seo-posts-sidebar">
	<div class="seo-posts-sidebar__heading <?= ( false != $links ) ? '' : 'seo-posts-sidebar__heading--only'?>">
		<?php if ( ! empty( $title ) ) : ?>
			<div class="seo-posts-sidebar__title">
				<?= esc_html( $title )?>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $link['url'] ) && ! empty( $link['title'] ) ) : ?>
			<div class="seo-posts-sidebar__button">
				<a href="<?= esc_url( $link['url'] ) ?>"
				class="seo-posts-sidebar__button-link button p"
				target="<?= esc_attr( $link['target'] ) ?>">
					<?= esc_html( $link['title'] ) ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
	<?php if ( ! empty( $links ) ) : ?>
		<?php foreach ( $links as $link_item ) : ?>
			<?php if ( ! empty( $link_item['link']['url'] ) && ! empty( $link_item['link']['title'] ) ) : ?>
				<a href="<?= esc_url( $link_item['link']['url'] ) ?>"
				class="seo-posts-sidebar__link h4"
				target="<?= esc_attr( $link_item['link']['target'] ) ?>">
					<?= esc_html( $link_item['link']['title'] ) ?>
				</a>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
