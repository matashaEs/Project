<?php

class Images {
	const IMAGE_SIZES = [
		[
			'name'   => 'full_hd',
			'width'  => 1920,
			'height' => 1080,
			'crop'   => false,
		],
	];

	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'add_images_sizes' ) );
	}

	/**
	 * Add images sizes
	 */
	function add_images_sizes() {
		foreach ( self::IMAGE_SIZES as $thumbnail ) {
			add_image_size( $thumbnail['name'], $thumbnail['width'], $thumbnail['height'], $thumbnail['crop'] );
		}
	}
}
