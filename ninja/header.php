<?php
/**
 * The template for displaying the header
 */

?><!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" type="image/png"
	      href="<?php echo TEMPLATE_DIRECTORY_URI; ?>/favicon.png"/>


	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 10]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser.
	Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve
	your experience.</p>
<![endif]-->
<header id="top_header">
<?php get_template_part( 'template/second_menu', 'home' ) ?>
<?php get_template_part( 'template/menu', 'home' ) ?>
</header>