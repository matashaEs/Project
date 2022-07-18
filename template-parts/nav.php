<header class="nav">
	<div class="container-fluid nav__desktop">
		<div class="container">
			<div class="nav__main-menu">
				<a href="<?= esc_url( get_home_url() ); ?>" class="nav-logo">
					<img src="<?= esc_url( get_template_directory_uri() . '/assets/img/logo.svg' ) ?>" alt="nav-logo">
				</a>
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
					<img src="<?= esc_url( get_template_directory_uri() . '/assets/img/nav-close.svg' ) ?>" class="nav-close" alt="nav-close">
				</div>
			</div>
		</div>
	</div>
</header>
