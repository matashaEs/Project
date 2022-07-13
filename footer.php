<?php
$social_media = get_field('social_media', 'options') ?? false;

if (have_rows('contact_information', 'option')) :
	while (have_rows('contact_information', 'option')): the_row();
		$address = get_sub_field('address');
		$phone_first = get_sub_field('phone_first');
		$mail = get_sub_field('mail');
		$country = get_sub_field('country');
	endwhile;
endif;

?>
<footer class="footer footer-mobile">
	<div class="container-fluid">
		<div class="container">
			<div class="row footer__row">
				<div class="footer__col">
					<h5 class="footer__title">Connect</h5>
				</div>
				<div class="footer__col">
					<div class="footer__content">
						<p><?= $address ?></p>
						<p><?= $country ?></p>
					</div>
					<div class="footer__content">
						<p><a href="mailto: <?= $mail ?>"> <?= $mail ?></a></p>
						<p><?= $phone_first ?></p>
					</div>
					<?php
					if ($social_media):
						?>
						<div class="footer__content">
							<ul class="footer__social-media">
								<?php foreach ($social_media as $item):
									$icon = $item['title'] ?? false;
									$target = $item['link'] ?? '#';

									if ($icon):
										?>

										<li class="social-media__item">
											<a href="<?php echo esc_url($target); ?>" target="_blank">
												<?= $icon ?>
											</a>
										</li>

									<?php
									endif;
									?>
								<?php endforeach; ?>
							</ul>
						</div>

					<?php
					endif;
					?>
				</div>
			</div>
			<div class="row footer__row">
				<div class="footer__col">
					<h5 class="footer__title">Explore</h5>
				</div>
				<div class="footer__col">
					<?php
					wp_nav_menu(array(
							'menu' => "footer-menu-mobile",
							'menu_class' => "footer__menu",
							'theme_location' => 'footer-menu-mobile',
							'container' => "div",
							'items_wrap' => '<ul class="%2$s">%3$s</ul>',
							'fallback_cb' => false,
					));
					?>
				</div>
			</div>
			<div class="row footer__row">
				<div class="footer__col">
					<h5 class="footer__title footer__title-cai">© CAI <?php echo date("Y"); ?></h5>
				</div>
				<div class="footer__col">
					<p class="footer__small">Website Designed by BS LLC</p>
				</div>
			</div>
		</div>
	</div>
</footer>
<footer class="footer footer-desktop">
	<div class="container-fluid">
		<div class="container">
			<div class="row footer__row">
				<div class="footer__col">
					<?= get_svg('cai-logo.svg', 'footer__logo'); ?>
					<p class="footer__big">Industry-specific, mission-critical enterprise and warehouse management
						software.</p>
					<?php
					if ($social_media):
						?>
						<ul class="footer__social-media">
							<?php foreach ($social_media as $item):
								$icon = $item['title'] ?? false;
								$target = $item['link'] ?? '#';
								$file = get_template_directory() . "/assets/img/icon-" . $icon . ".svg";

								if ($icon):
									?>

									<li class="social-media__item">
										<a href="<?php echo esc_url($target); ?>" target="_blank">
											<?php echo file_get_contents($file, true); ?>
										</a>
									</li>

								<?php
								endif;
								?>
							<?php endforeach; ?>
						</ul>

					<?php
					endif;
					wp_nav_menu(array(
							'menu' => "footer-menu",
							'menu_class' => "footer__menu",
							'theme_location' => 'footer-menu',
							'container' => "div",
							'items_wrap' => '<ul class="%2$s">%3$s</ul>',
							'fallback_cb' => false,
					));
					?>
				</div>
				<div class="footer__col">
					<h5 class="footer__title">Get in touch</h5>
					<a href="mailto: <?= $mail ?>"> <?= $mail ?></a>
					<a class="button button--footer">Live Chat</a>
					<h5 class="footer__title">Explore</h5>
					<?php
					wp_nav_menu(array(
							'menu' => "footer-menu-explore",
							'menu_class' => "footer__menu",
							'theme_location' => 'footer-menu-explore',
							'container' => "div",
							'items_wrap' => '<ul class="%2$s">%3$s</ul>',
							'fallback_cb' => false,
					));
					?>
					<?= $address ?>
					<?= $phone_first ?>
					<h5 class="footer__title footer__title-cai">© CAI <?php echo date("Y"); ?></h5>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php
wp_footer();
?>
</body>
</html>
