<?php

class Menu {
	public function __construct() {
		add_action( 'init', array( $this, 'init_menus' ) );
	}

	/**
	 * Register menus for the website
	 */
	function init_menus(): void {
		register_nav_menu( 'primary-menu', __( 'Main menu', 'nuplo' ) );
		register_nav_menu( 'footer-menu', __( 'Footer menu', 'nuplo' ) );
	}
}
