<?php
$social_media = get_field( 'social_media', 'options' ) ?? false;

if ( have_rows( 'contact_information', 'option' ) ) :
	while ( have_rows( 'contact_information', 'option' ) ) :
		the_row();
		$address     = get_sub_field( 'address' );
		$phone_first = get_sub_field( 'phone_first' );
		$mail        = get_sub_field( 'mail' );
		$country     = get_sub_field( 'country' );
	endwhile;
endif;

?>
<footer class="footer footer-mobile">
	<div class="container-fluid">
		<div class="container">
			<div class="row footer__row">
				<div class="footer__col">
					<h5 class="footer__title"><?php _e( 'Connect', 'nuplo' ); ?></h5>
				</div>
				<div class="footer__col">
					<div class="footer__content">
						<?php if ( ! empty( $address ) ) : ?>
							<p><?= esc_html( $address ) ?></p>
						<?php endif; ?>
						<?php if ( ! empty( $country ) ) : ?>
							<p><?= esc_html( $country ) ?></p>
						<?php endif; ?>
					</div>
					<div class="footer__content">
						<?php if ( ! empty( $mail ) ) : ?>
							<p><a href="mailto: <?= esc_html( $mail ) ?>"> <?= esc_html( $mail ) ?></a></p>
						<?php endif; ?>
						<?php if ( ! empty( $phone_first ) ) : ?>
							<p><?= esc_html( $phone_first ) ?></p>
						<?php endif; ?>
					</div>
					<?php
					if ( $social_media ) :
						?>
						<div class="footer__content">
							<ul class="footer__social-media">
								<?php
								foreach ( $social_media as $item ) :
									$icon   = $item['title'] ?? false;
									$target = $item['link'] ?? '#';

									if ( $icon ) :
										?>

										<li class="footer__social-media-item">
											<a href="<?php echo esc_url( $target ); ?>" target="_blank">
												<?= esc_html( $icon ) ?>
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
					<h5 class="footer__title"><?php _e( 'Explore', 'nuplo' ); ?></h5>
				</div>
				<div class="footer__col">
					<?php
					wp_nav_menu(
						[
							'menu'           => 'footer-menu-mobile',
							'menu_class'     => 'footer__menu',
							'theme_location' => 'footer-menu-mobile',
						]
					);
					?>
				</div>
			</div>
			<div class="row footer__row">
				<div class="footer__col">
					<h5 class="footer__title footer__title-cai">
						<?php _e( '© CAI ', 'nuplo' ); ?> <?php echo esc_html( gmdate( 'Y' ) ); ?>
					</h5>
				</div>
				<div class="footer__col">
					<p class="footer__small"><?php _e( 'Website Designed by BS LLC', 'nuplo' ); ?></p>
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
					<?php the_svg( 'cai-logo.svg', 'footer__logo' ); ?>
					<p class="footer__big">
					<?php
					_e(
						'Industry-specific, mission-critical enterprise and warehouse management software.',
						'nuplo'
					);
					?>
					</p>
					<div class="footer__flex footer__flex--first">
						<?php
						if ( $social_media ) :
							?>
							<ul class="footer__social-media">
								<?php
								foreach ( $social_media as $item ) :
									$icon   = $item['title'] ?? false;
									$target = $item['link'] ?? '#';

									if ( $icon ) :
										?>

										<li class="footer__social-media-item">
											<a href="<?php echo esc_url( $target ); ?>" target="_blank">
												<?php the_svg( 'icon-' . $icon ); ?>
											</a>
										</li>

										<?php
									endif;
									?>
								<?php endforeach; ?>
							</ul>

							<?php
						endif;
						wp_nav_menu(
							[
								'menu'           => 'footer-menu',
								'menu_class'     => 'footer__menu',
								'theme_location' => 'footer-menu',
							]
						);
						?>
					</div>
				</div>
				<div class="footer__col">
					<h5 class="footer__title"><?php _e( 'Get in touch', 'nuplo' ); ?></h5>
					<div class="footer__flex">
						<?php if ( ! empty( $mail ) ) : ?>
							<p class="footer__mail"><a href="mailto: <?= esc_html( $mail ) ?>"> <?= esc_html( $mail ) ?></a></p>
						<?php endif; ?>
						<a class="button button--footer footer__button"><?php _e( 'Live Chat', 'nuplo' ); ?></a>
					</div>
					<h5 class="footer__title"><?php _e( 'Explore', 'nuplo' ); ?></h5>
					<div class="footer__menu-explore">
						<?php
						wp_nav_menu(
							[
								'menu'           => 'footer-menu-explore',
								'menu_class'     => 'footer__menu',
								'theme_location' => 'footer-menu-explore',
							]
						);
						?>
					</div>
					<div class="footer__flex">
						<?php if ( ! empty( $address ) ) : ?>
							<p class="footer__address"><?= esc_html( $address ) ?></p>
						<?php endif; ?>
						<?php if ( ! empty( $phone_first ) ) : ?>
							<p class="footer__phone"><?= esc_html( $phone_first ) ?></p>
						<?php endif; ?>
						<p class="footer__cai">
							<?php _e( '© CAI ', 'nuplo' ); ?><?php echo esc_html( gmdate( 'Y' ) ); ?>
						</p>
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
