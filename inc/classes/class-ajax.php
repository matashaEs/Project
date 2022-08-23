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
		$next_page          = isset( $_GET['currentPage'] ) ? wp_kses_post( $_GET['currentPage'] ) + 1 : 1;
		$news_list          = apply_filters( 'cai_get_filtered_news', null );
		$news_list['paged'] = $next_page;

		query_posts( $news_list );
		if ( have_posts() ) {
			ob_start();

			while ( have_posts() ) :
				the_post();
				$args = [
					'url'        => get_the_permalink(),
					'image_url'  => wp_get_attachment_url( get_post_thumbnail_id() ),
					'date'       => get_the_time( 'F j, Y' ),
					'categories' => apply_filters( 'cai_get_news_category', get_the_ID() ),
					'title'      => get_the_title(),
				];
				get_template_part( 'template-parts/news-posts', '', $args );
			endwhile;

			wp_send_json_success( ob_get_clean() );
		} else {
			wp_send_json_error( __( 'No more data', 'nuplo' ) );
		}
	}
}
