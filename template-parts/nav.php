<?php
$title_nav = '';
if ( have_rows( 'header_dropdown_menu', 'option' ) ) :
	while ( have_rows( 'header_dropdown_menu', 'option' ) ) :
		the_row();
		$title_nav   = get_sub_field( 'title' );
		$description = get_sub_field( 'description' );
		$buttons     = get_sub_field( 'buttons' );
	endwhile;
endif;
?>

<header class="nav">
	<div class="container-fluid nav__fluid">
		<div class="container nav__container">
			<div class="nav__mobile">
				<div class="nav__open">
					<a href="<?= esc_url( get_home_url() ); ?>" class="nav-logo">
						<?php the_svg( 'cai-logo.svg', 'nav__logo' ); ?> </a>
					<?php the_svg( 'nav-open.svg', 'nav__open-icon' ); ?>
				</div>
				<div class="nav__mobile-menu">
					<div class="nav__close">
						<a href="<?= esc_url( get_home_url() ); ?>" class="nav-logo">
							<?php the_svg( 'cai-logo.svg', 'nav__logo' ); ?> </a>
						<div class="nav__close-exit">
							<h5 class="nav__close-text"><?php _e( 'Exit', 'nuplo' ); ?></h5>
							<?php the_svg( 'nav-close.svg', 'nav__close-icon' ); ?>
						</div>
					</div>
					<div class="nav__info">
						<div class="nav__search-form">
							<form action="<?php echo esc_url( site_url( '/' ) ); ?>" type="GET">
								<input type="text" id="searchField" name="s" placeholder="" class="input nav__input">
								<div id="searchResults">
								</div>
							</form>
						</div>
						<?php if ( ! empty( $title_nav ) ) : ?>
							<h1> <?= esc_html( $title_nav ) ?> </h1>
						<?php endif; ?>
						<div class="nav__buttons">
							<?php if ( ! empty( $buttons ) ) : ?>
								<?php foreach ( $buttons as $button ) : ?>
									<?php if ( ! empty( $button ) ) : ?>
									<a href="<?= esc_url( $button['button']['url'] ) ?>" class="button p nav__button">
										<?= esc_html( $button['button']['title'] ) ?>
									</a>
							<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
					<div class="nav__mobile-items">
						<?php
						wp_nav_menu(
							[
								'theme_location' => 'menu-mobile',
								'container'      => false,
								'items_wrap'     => '%3$s',
								'add_li_class'   => 'nav__mobile-menu-item h3',
							]
						);
						?>
					</div>
				</div>
			</div>
			<div class="nav__desktop">
				<div class="nav__main-menu nav__main-menu--visible">
					<a href="<?= esc_url( get_home_url() ); ?>" class="nav-logo">
						<?php the_svg( 'cai-logo.svg', 'nav__logo' ); ?>
						<div class="nav__main-menu-items">
							<?php
							wp_nav_menu(
								[
									'menu'         => 'primary-menu',
									'container'    => false,
									'items_wrap'   => '%3$s',
									'add_li_class' => 'nav__main-menu-item p',
								]
							);
							?>
							<div class="nav__main-menu--open">
								<?php the_svg( 'nav-open.svg', 'nav-open' ); ?>
							</div>
						</div>
				</div>
			</div>
			<div class="nav-container">
				<div class="nav__desktop--extended">
					<div class="nav__close">
						<a href="<?= esc_url( get_home_url() ); ?>" class="nav-logo">
							<?php the_svg( 'cai-logo.svg', 'nav__logo' ); ?> </a>
						<div class="nav__close-exit">
							<h5 class="nav__close-text"><?php _e( 'Exit', 'nuplo' ); ?></h5>
							<?php the_svg( 'nav-close.svg', 'nav__close-icon' ); ?>
						</div>
					</div>
					<div class="nav__desktop-content">
						<div class="nav__desktop-text">
							<?php if ( ! empty( $title_nav ) ) : ?>
								<h3 class="nav__desktop-title"> <?= esc_html( $title_nav ) ?> </h3>
							<?php endif; ?>
							<?php if ( ! empty( $description ) ) : ?>
								<p class="nav__desktop-description"> <?= esc_html( $description ) ?> </p>
							<?php endif; ?>
							<div class="nav__buttons">
								<?php if ( ! empty( $buttons ) ) : ?>
									<?php foreach ( $buttons as $button ) : ?>
										<?php if ( ! empty( $button ) ) : ?>
										<a href="<?= esc_url( $button['button']['url'] ) ?>" class="button p nav__button">
											<?= esc_html( $button['button']['title'] ) ?>
										</a>
									<?php endif; ?>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="nav__desktop-menu">
								<form action="<?php echo esc_url( site_url( '/' ) ); ?>" type="GET" class="nav__desktop-form">
									<input type="text" id="searchField" name="s" placeholder="Search" class="nav-input input">
									<input type="submit" value="<?php _e( 'Submit', 'nuplo' ); ?>" id="searchButton" class="button nav-button">
									<div id="searchResults">
									</div>
								</form>
							<div class="nav__desktop-menu-items">
								<?php
								wp_nav_menu(
									[
										'theme_location' => 'primary-menu-extended',
										'container'      => false,
										'items_wrap'     => '%3$s',
										'add_li_class'   => 'nav__desktop-menu-extended-item h5',
									]
								);
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
