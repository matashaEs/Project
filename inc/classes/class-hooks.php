<?php

/**
 * Filters and actions definitions
 */
class Hooks {
	public function __construct() {
		add_action( 'excerpt_more', [ $this, 'set_excerpt_content' ] );
		add_filter( 'nav_menu_css_class', [ $this, 'add_additional_class_on_li' ], 5, 3 );
		add_action( 'acf/init', [ $this, 'acf_map_api' ] );
		add_filter( 'template_heading_title', [ $this, 'download_datasheet_title' ] );
	}

	public function download_datasheet_title( $title ) {
		if ( is_page_template( 'page-download.php' ) ) {
			$what_is_downloaded = '';

			if ( get_query_var( 'download-product' ) ) {
				$what_is_downloaded = get_posts(
					[
						'name'           => get_query_var( 'download-product' ),
						'post_type'      => 'product',
						'posts_per_page' => 1,
						'post_status'    => 'publish',
					]
				)[0]->post_title;
			} elseif ( get_query_var( 'category' ) ) {
				$what_is_downloaded = get_category_by_slug( get_query_var( 'category' ) )->name;
			}

			if ( ! empty( $what_is_downloaded ) ) {
				return 'Download ' . $what_is_downloaded . ' Datasheet';
			}
		}

		return $title;
	}

	/**
	 * Remove [...] from the excerpt
	 */
	public function set_excerpt_content(): string {
		return '';
	}

	public function add_additional_class_on_li( $classes, $items, $args ) {
		if ( 'primary-menu' == $args->menu || 'menu-mobile' == $args->theme_location || 'primary-menu-extended' == $args->theme_location ) {
			if ( isset( $args->add_li_class ) ) {
				$classes[] = $args->add_li_class;
			}
		}

		return $classes;
	}

	/**
	 * Update ACF settings with Google Maps API key from Options Page
	 */
	public function acf_map_api() {
		$google_maps_options = get_field( 'google_maps', 'option' );
		$google_maps_api     = '';
		if ( ! empty( $google_maps_options ) ) :
			$google_maps_api = $google_maps_options['google_maps_api_key'] ?? '';
		endif;

		acf_update_setting( 'google_api_key', $google_maps_api );
	}
}
