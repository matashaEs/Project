<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta
			name="viewport"
			content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
	>
	<link rel="preload" href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/fonts/Aeonik-Medium.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/fonts/Aeonik-Regular.woff2" as="font" type="font/woff2" crossorigin>
	<link
			rel="apple-touch-icon" sizes="57x57"
			href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/favicon/apple-icon-57x57.png">
	<link
			rel="apple-touch-icon" sizes="60x60"
			href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/favicon/apple-icon-60x60.png">
	<link
			rel="apple-touch-icon" sizes="72x72"
			href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/favicon/apple-icon-72x72.png">
	<link
			rel="apple-touch-icon" sizes="76x76"
			href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/favicon/apple-icon-76x76.png">
	<link
			rel="apple-touch-icon" sizes="114x114"
			href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/favicon/apple-icon-114x114.png">
	<link
			rel="apple-touch-icon" sizes="120x120"
			href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/favicon/apple-icon-120x120.png">
	<link
			rel="apple-touch-icon" sizes="144x144"
			href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/favicon/apple-icon-144x144.png">
	<link
			rel="apple-touch-icon" sizes="152x152"
			href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/favicon/apple-icon-152x152.png">
	<link
			rel="apple-touch-icon" sizes="180x180"
			href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/favicon/apple-icon-180x180.png">
	<link
			rel="icon" type="image/png" sizes="192x192"
			href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/favicon/android-icon-192x192.png">
	<link
			rel="icon" type="image/png" sizes="32x32"
			href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/favicon/favicon-32x32.png">
	<link
			rel="icon" type="image/png" sizes="96x96"
			href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/favicon/favicon-96x96.png">
	<link
			rel="icon" type="image/png" sizes="16x16"
			href="<?= esc_url( get_stylesheet_directory_uri() ); ?>/assets/favicon/favicon-16x16.png">
	<?php
	wp_head();
	?>
</head>

<body <?php body_class(); ?>>
<?php
wp_body_open();
?>

<?php
get_template_part( 'template-parts/nav', null );
?>
