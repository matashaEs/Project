<?php
require_once 'class-general-config.php';
require_once 'class-images.php';
require_once 'class-hooks.php';
require_once 'class-ajax.php';
require_once 'class-menu.php';
require_once 'class-assets.php';
require_once 'class-translation.php';
require_once 'block-render.php';

/**
 * Theme bootstrap
 */
class Nuplo_Theme {
	function __construct() {
		new General_Config();
		new Images();
		new Hooks();
		new Translation();
		new Ajax();
		new Assets();
		new Menu();
	}
}
