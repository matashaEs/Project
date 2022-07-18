<?php

/**
 * Filters and actions definitions
 */
class Hooks {
	public function __construct() {
		add_action( 'excerpt_more', [ $this, 'set_excerpt_content' ] );
		add_filter( 'nav_menu_css_class', [ $this, 'add_additional_class_on_li' ], 5, 3 );
	}

	/**
	 * Remove [...] from the excerpt
	 */
	public function set_excerpt_content(): string {
		return '';
	}

	public function add_additional_class_on_li( $classes, $items, $args ) {
		if ( 'primary-menu' == $args->menu ) {
			if ( isset( $args->add_li_class ) ) {
				$classes[] = $args->add_li_class;
			}
		}

		return $classes;
	}
}
