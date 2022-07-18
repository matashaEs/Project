<header class="nav">
	<div class="container-fluid nav__desktop">
		<div class="container">
			<div class="nav__main-menu">
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
					<?php the_svg( 'nav-close.svg', 'nav-close' ); ?>
				</div>
			</div>
		</div>
	</div>
</header>
