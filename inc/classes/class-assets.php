<?php

class Assets {
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'add_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'add_js' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'localize_scripts' ) );
		add_action( 'wp_default_scripts', array( $this, 'delete_jquery_migrate' ) );
		$this->delete_not_required_stuff();
	}

	/**
	 * delete annoying message about jquery migrate
	 */
	public function delete_jquery_migrate( $scripts ) {
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
		global $wp_query;

		// name of this localize script have to be the same as in the wp_enqueue_script handle name
		wp_localize_script( 'common_js', 'websiteData', array(
			'rootUrl'     => get_site_url(),
			'ajaxUrl'     => admin_url( 'admin-ajax.php' ),
			'nonce'       => wp_create_nonce( 'wp_ajax' ),
			'queryVars'   => json_encode( $wp_query->query_vars ),
			'currentPage' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
			'max_page'    => $wp_query->max_num_pages,
			'env'         => wp_get_environment_type(),
		) );
	}

	/**
	 * Load external css files
	 */
	function add_styles(): void {
		wp_enqueue_style( 'normalize_css', get_parent_theme_file_uri( '/assets/normalize.css' ), array(), wp_get_theme()->get( 'Version' ) );
		wp_enqueue_style( 'common_css', get_parent_theme_file_uri( '/assets/common.css' ), array( 'normalize_css' ), wp_get_theme()->get( 'Version' ) );
	}

	/**
	 * Load external JS files
	 */
	function add_js(): void {
		wp_enqueue_script(
			'common_js',
			get_parent_theme_file_uri( '/assets/common.js' ),
			array(
				'jquery',
			),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}
}
