<?php

/**
 * Additional functionality working with AJAX
 */
class Ajax {
	public function __construct() {
		add_action( 'wp_ajax_load_more_posts', [ $this, 'load_more' ] );
		add_action( 'wp_ajax_nopriv_load_more_posts', [ $this, 'load_more' ] );
	}

	/**
	 * Load more posts in home - infinite scroll
	 */
	function load_more(): void {
		if ( ! isset( $_GET['nonce'] ) || ! wp_verify_nonce( wp_kses_post( $_GET['nonce'] ), 'wp_ajax' ) ) {
			wp_send_json_error( __( 'You passed incorrect data...', 'nuplo' ) );
		}

		$next_page           = ! empty( get_query_var( 'currentPage' ) ) ? get_query_var( 'currentPage' ) + 1 : 1;
		$args                = json_decode( stripslashes( ! empty( get_query_var( 'queryVars' ) ) ? get_query_var( 'queryVars' ) : '' ), true );
		$args['post_status'] = 'publish';
		$args['paged']       = $next_page;

		$news_list = apply_filters( 'cai_get_filtered_news_ajax', $args );

		if ( empty( $news_list ) ) {
			wp_send_json_error( __( 'No more data', 'nuplo' ) );
		} else {
			ob_start();
			foreach ( $news_list as $news ) {
				get_template_part( 'template-parts/news-posts', '', $news );
			}
			wp_send_json_success( ob_get_clean() );
		}
	}
}
