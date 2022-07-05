<?php
/**
 * DISPLAY SVG (located in a theme)
 */
function the_svg( $name, $css_class = '', $inline = true ) {
	echo get_svg( $name, $css_class, $inline );
}

/**
 * GET SVG (located in a theme)
 */
function get_svg( $name, $css_class = '', $inline = true ): string {
	$path = str_replace( '.svg', '', $name );

	if ( $inline ) {
		$file    = get_template_directory() . "/assets/img/" . $path . ".svg";
		$content = file_get_contents( $file, true );

		if ( ! empty( $css_class ) ) {
			if ( str_contains( $content, ' class="' ) ) {
				$content = str_replace( 'class="', 'class="' . $css_class . ' ', $content );
			} else {
				$content = str_replace( '<svg ', '<svg class="' . $css_class . '"', $content );
			}
		}

		return $content;
	}

	$file = get_template_directory_uri() . "/assets/img/" . $path . ".svg";

	return '<img src="' . $file . '" />';
}
