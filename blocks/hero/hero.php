<?php
/**
 * $title
 * $background_image_mobile
 * $background-image
 * $button
 */


if (!empty($block['id'])) {
	extract(get_fields($block['id']));
} else {
	extract($block['data']);
}
?>

<section class="container-fluid hero">
	<div class="hero__image">
		<img src="<?= $background_image_mobile['sizes']['full_hd']; ?>" class="hero__image-mobile">
	</div>
	<div class="container">
		<div class="hero__content">
			<?php if (!empty ($title)): ?>
				<h1 class="h1-alt"><?= $title ?></h1>
			<?php endif;
			if (!empty($button)):
				$button_title = $button['title'];
				$button_url = $button['url'];
				?>
				<div class="hero__button">
					<a href="<?= $button_url ?>" class="button">
						<?= $button_title ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
