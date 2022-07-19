<?php

/**
 * Place to declare menu
 */
class Menu {
	public function __construct() {
		add_action( 'init', [ $this, 'init_menus' ] );
	}

	/**
	 * Register menus for the website
	 */
	function init_menus(): void {
		register_nav_menu( 'primary-menu', __( 'Main menu', 'nuplo' ) );
		register_nav_menu( 'primary-menu-extended', __( 'Main menu (extended)', 'nuplo' ) );
		register_nav_menu( 'primary-menu-extended-mobile', __( 'Main menu (extended, for mobile)', 'nuplo' ) );
		register_nav_menu( 'footer-menu-explore', __( 'Footer menu explore', 'nuplo' ) );
		register_nav_menu( 'footer-menu', __( 'Footer menu', 'nuplo' ) );
		register_nav_menu( 'footer-menu-mobile', __( 'Footer menu mobile', 'nuplo' ) );
	}
}
