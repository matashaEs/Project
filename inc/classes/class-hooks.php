<?php

class Hooks {
	public function __construct() {
		add_action( 'excerpt_more', array( $this, 'set_excerpt_content' ) );
	}

	/**
	 * Remove [...] from the excerpt
	 */
	public function set_excerpt_content(): string {
		return '';
	}
}
