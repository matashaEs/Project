<?php

/**
 * Assets management (CSS, JS, Global Variables)
 */
class Assets {
	public function __construct() {

		$this->delete_not_required_stuff();
	}

	/**
	 * Delete annoying message about jquery migrate
	 *
	 * @param object $scripts List of scripts.
	 */
	public function delete_jquery_migrate( object $scripts ) {
		if ( ! empty( $scripts->registered['jquery'] ) ) {
			$scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, [ 'jquery-migrate' ] );
		}
	}

	/**
	 * Delete stuff which is mostly not used on websites
	 */
	public function delete_not_required_stuff() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );

		remove_action( 'wp_head', 'wp_generator' );

		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
	}

	/**
	 * JS printed in the source code of the website - for sharing with loaded JS
	 */
	function localize_scripts(): void {
		$args = apply_filters( 'cai_get_main_query_args', null );

		// name of this localize script have to be the same as in the wp_enqueue_script handle name.
		wp_localize_script(
			'common_js',
			'websiteData',
			[
				'rootUrl'     => get_site_url(),
				'ajaxUrl'     => admin_url( 'admin-ajax.php' ),
				'nonce'       => wp_create_nonce( 'wp_ajax' ),
				'queryVars'   => $args['queryVars'],
				'currentPage' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
				'maxPage'     => $args['maxPage'],
				'env'         => wp_get_environment_type(),
				'portalID'    => get_field( 'portal_id', 'options' ) ?? '',
			]
		);
	}

	/**
	 * Load external css files
	 */
	function add_styles(): void {
		wp_enqueue_style( 'normalize_css', get_parent_theme_file_uri( '/assets/normalize.css' ), [], wp_get_theme()->get( 'Version' ) );
		wp_enqueue_style( 'common_css', get_parent_theme_file_uri( '/assets/common.css' ), [ 'normalize_css' ], wp_get_theme()->get( 'Version' ) );
		wp_enqueue_style( 'slick_slider_css', get_parent_theme_file_uri( '/assets/slick.min.css' ), [], wp_get_theme()->get( 'Version' ) );
	}

	/**
	 * Load external JS files
	 */
	function add_js(): void {
		wp_enqueue_script(
			'common_js',
			get_parent_theme_file_uri( '/assets/common.js' ),
			[
				'jquery',
				'slick_slider_js',
			],
			wp_get_theme()->get( 'Version' ),
			true
		);

		wp_enqueue_script(
			'slick_slider_js',
			get_parent_theme_file_uri( '/assets/slick.min.js' ),
			[
				'jquery',
			],
			wp_get_theme()->get( 'Version' ),
			true
		);

		$google_maps = get_field( 'google_maps', 'options' ) ?? false;
		if ( is_page_template( 'page-contact.php' ) && ! empty( $google_maps ) ) {
			$google_maps_api_key = $google_maps['google_maps_api_key'];
			wp_enqueue_script(
				'google_maps',
				'https://maps.googleapis.com/maps/api/js?key=' . $google_maps_api_key . '&callback=initMap',
				[ 'block_map' ],
				wp_get_theme()->get( 'Version' ),
				true
			);
		}
	}

	/**
	 * Load Google Maps when the full HTML document has been parsed
	 *
	 * @param string $tag The <script> tag for the enqueued script.
	 * @param string $handle The script's registered handle.
	 *
	 * @return string
	 */
	function add_defer( string $tag, string $handle ) {
		if ( 'google_maps' !== $handle ) {
			return $tag;
		}

		return str_replace( ' src=', ' defer src=', $tag );
	}

	/**
	 * Load JS scripts from options page to header
	 */
	public function add_code_to_header() {
		$scripts = get_field( 'scripts', 'options' ) ?? false;
		// @codingStandardsIgnoreStart
		echo ! empty( $scripts && $scripts['header_scripts'] ) ? $scripts['header_scripts'] : '';
		// @codingStandardsIgnoreEnd
	}

	/**
	 * Load JS scripts from options page to footer
	 */
	public function add_code_to_footer() {
		$scripts = get_field( 'scripts', 'options' ) ?? false;
		// @codingStandardsIgnoreStart
		echo ! empty( $scripts && $scripts['footer_scripts'] ) ? $scripts['footer_scripts'] : '';
		// @codingStandardsIgnoreEnd
	}
}
