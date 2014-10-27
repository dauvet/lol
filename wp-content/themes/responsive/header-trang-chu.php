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
	<link rel="icon" href="<?php echo get_bloginfo('template_url') ?>/images/favicon.ico" />
	<link rel="shortcut icon" href="<?php  echo get_bloginfo('template_url') ?>/images/favicon.ico" />
	<link type="text/css" href="<?php echo get_bloginfo('template_url') ?>/layouts/normalize.css" rel="stylesheet">
	<link type="text/css" href="<?php echo get_bloginfo('template_url') ?>/layouts/jquery.scrollbar.css" rel="stylesheet">

	<script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/js/jquery-1.11.1.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/js/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/js/fancybox/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url') ?>/js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />


	<script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/js/jquery.truncate.min.js"></script>
	<script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/js/jquery.scrollbar.js"></script>
	<script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/js/lol.homepage.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class("trang-chu"); ?>>
<div id="page" class="hfeed site">
	<div id="site-navigation-bg"></div>

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'responsive' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'trang-chu' ) ) ); ?>" rel="home"><div class="logo" ></div></a>
		</div>
		<div class="download-menu">
			<?php
			// MOBILE DETECT
			require_once "lib/mobile-detect-2.8.5/Mobile_Detect.php";
			$detect = new Mobile_Detect;
			?>
			<?php if($detect->isAndroidOS()): ?>
				<a class="dl-android" href="<?php echo landing_settings_get("android_link") ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/home/android.png"></a>
			<?php elseif($detect->isiOS()): ?>
				<a class="dl-ios" href="<?php echo landing_settings_get("ios_jailbreak_link") ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/home/ios-jailbreak.png"></a>
				<a class="dl-ios" href="<?php echo landing_settings_get("ios_link") ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/home/ios-itunes.png"></a>
			<?php else: ?>
				<a href="<?php echo landing_settings_get("android_link") ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/home/android.png"></a>
				<a href="<?php echo landing_settings_get("ios_jailbreak_link") ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/home/ios-jailbreak.png"></a>
				<a href="<?php echo landing_settings_get("ios_link") ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/home/ios-itunes.png"></a>
			<?php endif; ?>
		</div>

		<div class="sub">
			<nav id="site-navigation" class="main-navigation" role="navigation">
<!--				<button class="menu-toggle">--><?php //_e( 'Primary Menu', 'responsive' ); ?><!--</button>-->
				<div class="desktop"><?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?></div>
				<div class="mobile"><?php wp_nav_menu( array( 'theme_location' => 'primary_mobile' ) ); ?></div>
			</nav><!-- #site-navigation -->
		</div>
        <a id="logo-mobi" href="<?php echo esc_url( get_permalink( get_page_by_path( 'trang-chu' ) ) ); ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/event/logo.png" alt="Logo"></a>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
