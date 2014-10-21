<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package responsive
 */

get_header(); ?>
<?
$event_menu = wp_get_nav_menu_items('Event Menu');
$categories = get_the_category();
if ($categories){
	$cur_cat = $categories[0];
	$found = false;
	foreach($event_menu as $item){
		if ($item->object == 'category' && $item->object_id == $cur_cat->cat_ID){
			// Xử lý khi thấy category hiện tại đang nằm trong menu 'Event menu'
			// include menu event vào đây
			$found = $true;
			break;
		}
	}
	if (!$found){
		// Nếu chưa tìm thấy  trong menu 'Event menu' thì tiếp tục tìm trong menu
		$about_menu = wp_get_nav_menu_items('About Menu');
		foreach($about_menu as $item){
			if ($item->object == 'category' && $item->object_id == $cur_cat->cat_ID){
				// Xử lý khi thấy category hiện tại đang nằm trong menu 'About menu'
				// include menu about vào
				break;
			}
		}
	}
}
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="sub_wrap">
			<div class="sub_left">
				<ul class="subdownload">
					<li><a href="#" target="_blank"><img src="<?php echo get_bloginfo('template_url') ?>/images/event/download_1.jpg" alt="android"></a></li>
					<li><a href="javascript:void(0);" onclick="alert('a！')" title="iso"><img src="<?php echo get_bloginfo('template_url') ?>/images/event/download_2.jpg"></a></li>
					<li><a title="IOS" href="#l" target="_blank"><img src="<?php echo get_bloginfo('template_url') ?>/images/event/download_3.jpg"></a></li>
				</ul>
				<dl class="adds"><dd><a><img src="<?php echo get_bloginfo('template_url') ?>/images/event/ads.png" alt=""></a></dd></dl>
				<div id="example">
					<div class="catechose">
						<h1>NHÂN VẬT</h1>
					</div>
					<div class="slides">
						<div class="slides_container">

						</div>
					</div>
				</div>
			</div>
			<div class="sub_right">
				<div class="subtab2">
					<?php wp_nav_menu( array('menu' => 'event-menu' ));  ?>
				</div>
				<div class="statue">
					<a href="#" title="">Trang Chủ</a> &gt; <a href="#"><?php echo single_cat_title("", false); ?></a>
				</div>
				<div class="content">
					<ul class="list_news">
					<?php
					while ( have_posts()) : the_post() ?>

						<li><a href="<?php the_permalink(); ?>"><em><?php echo "10/12/1991" ?></em><?php the_title(); ?></a> </li>

					<?php endwhile ?>
					</ul>
					<div class="pager">  <a id="prevPageNow" href="javascript:void(0);">&lt;</a>  <a id="pageNow" href="javascript:void(0);">1</a><a href="http://ttyx.daw.so/category/42/2.html">2</a><a href="http://ttyx.daw.so/category/42/3.html">3</a>  <a id="nextPage" href="http://ttyx.daw.so/category/42/2.html">&gt;</a> </div>
				</div>
			</div>

		</div>

	</main><!-- #main -->
</div><!-- #primary -->


<?php //get_sidebar(); ?>
<?php get_footer(); ?>
