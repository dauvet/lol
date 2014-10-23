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
<script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/js/jquery-1.11.1.min.js"></script>
    <script>
        $(function() {
            var pull 		= $('#pull');
            menu 		= $('nav ul');
            menuHeight	= menu.height();

            $(pull).on('click', function(e) {
                e.preventDefault();
                menu.slideToggle();
            });

            $(window).resize(function(){
                var w = $(window).width();
                if(w > 320 && menu.is(':hidden')) {
                    menu.removeAttr('style');
                }
            });
        });
    </script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page-event" class="hfeed site">
    <div id="sub">
        <nav class="clearfix">
            <ul class="clearfix">
                <li><a href="<?php echo esc_url( home_url( '/cach-choi/' ))  ?>" title="intro">Giới Thiệu</a></li>
                <li><a href="<?php echo esc_url( home_url( '/danh-muc/su-kien' ) );?>" title="event">Sự Kiện</a></li>
                <li class="home"><a href="#" title="Logo"><img src="<?php echo get_bloginfo('template_url') ?>/images/event/logo.png" alt="Logo"></a></li>
                <li><a href="#">Hướng Dẫn</a></li>
                <li class="last"><a href="#">Diễn Đàn</a></li>
            </ul>
            <a href="#" id="pull">Menu</a>
        </nav>
    </div>

    <div id="content" class="site-content">
