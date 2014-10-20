<?php
/*
    Template Name: EventPage
*/
get_header(); ?>

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
						<a href="#" title="">Trang Chủ</a> &gt; <a href="#">Mới Nhất</a>
					</div>
					<div class="content">
						<ul class="list_news">
							<?php
							$recent_posts = wp_get_recent_posts();
							foreach( $recent_posts as $recent ){
								echo '<li><a href="' . get_permalink($recent["ID"]) . '"><em>'.date('d/m/Y', strtotime($recent["post_date"])).'</em>' .   $recent["post_title"].'</a> </li> ';
							}
							?>
						</ul>
						<div class="pager">  <a id="prevPageNow" href="javascript:void(0);">&lt;</a>  <a id="pageNow" href="javascript:void(0);">1</a><a href="http://ttyx.daw.so/category/42/2.html">2</a><a href="http://ttyx.daw.so/category/42/3.html">3</a>  <a id="nextPage" href="http://ttyx.daw.so/category/42/2.html">&gt;</a> </div>
					</div>
				</div>

			</div>


		</main><!-- #main -->
    </div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>