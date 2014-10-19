<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package responsive
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link type="text/css" href="<?php echo get_bloginfo('template_url') ?>/layouts/jquery.scrollbar.css" rel="stylesheet">

	<script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/js/jquery-1.11.1.min.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class("landing-page"); ?>>
<div id="page" class="hfeed site">
	<div id="site-navigation-bg"></div>

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'responsive' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	</header><!-- #masthead -->

	<div id="content" class="site-content">
