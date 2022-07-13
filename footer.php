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
					<h5 class="footer__title"><?php _e('Connect', 'nuplo'); ?></h5>
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

										<li class="footer__social-media-item">
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
					<h5 class="footer__title"><?php _e('Explore', 'nuplo'); ?></h5>
				</div>
				<div class="footer__col">
					<?php
					wp_nav_menu(array(
							'menu' => "footer-menu-mobile",
							'menu_class' => "footer__menu",
							'theme_location' => 'footer-menu-mobile',
					));
					?>
				</div>
			</div>
			<div class="row footer__row">
				<div class="footer__col">
					<h5 class="footer__title footer__title-cai">© CAI <?php echo date("Y"); ?></h5>
				</div>
				<div class="footer__col">
					<p class="footer__small"><?php _e('Website Designed by BS LLC', 'nuplo'); ?></p>
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
					<p class="footer__big"><?php _e('Industry-specific, mission-critical enterprise and warehouse
					management software.', 'nuplo'); ?></p>
					<div class="footer__flex footer__flex--first">
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

										<li class="footer__social-media-item">
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
						));
						?>
					</div>
				</div>
				<div class="footer__col">
					<h5 class="footer__title"><?php _e('Get in touch', 'nuplo'); ?></h5>
					<div class="footer__flex">
						<p class="footer__mail"><a href="mailto: <?= $mail ?>"> <?= $mail ?></a></p>
						<a class="button button--footer footer__button"><?php _e('Live Chat', 'nuplo'); ?></a>
					</div>
					<h5 class="footer__title"><?php _e('Explore', 'nuplo'); ?></h5>
					<div class="footer__menu-explore">
						<?php
						wp_nav_menu(array(
								'menu' => "footer-menu-explore",
								'menu_class' => "footer__menu",
								'theme_location' => 'footer-menu-explore',
						));
						?>
					</div>
					<div class="footer__flex">
						<p class="footer__address"><?= $address ?></p>
						<p class="footer__phone"><?= $phone_first ?></p>
						<p class="footer__cai">© CAI <?php echo date("Y"); ?></p>
					</div>
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
