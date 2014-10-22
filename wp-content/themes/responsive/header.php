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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page-event" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'responsive' ); ?></a>

    <div id="sub">
        <div class="nav">
            <div class="navBox">
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/cach-choi/' ))  ?>" title="intro">Giới Thiệu<p></p></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/category/su-kien' ) );?>" title="event">Sự Kiện<p></p></a></li>
                    <li class="home"><a href="#" title="Logo"><img src="<?php echo get_bloginfo('template_url') ?>/images/event/logo.png" alt="Logo"></a></li>
                    <li><a href="#" title="guide">Hướng Dẫn<p></p></a></li>
                    <li class="ddLast"><a href="#" target="_blank" title="forum">Diễn Đàn<p></p></a></li>
                </ul>
            </div>
        </div>

    </div>

	<div id="content" class="site-content">
