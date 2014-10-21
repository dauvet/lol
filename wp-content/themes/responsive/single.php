<?php
/**
 * The template for displaying all single posts.
 *
 * @package responsive
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
						<a href="#" title="">Trang Chủ</a> &gt; <a href="#">Sự Kiện</a>
					</div>
					<div class="content">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'single' ); ?>

							<?php //responsive_post_nav(); ?>



						<?php endwhile; // end of the loop. ?>

					</div>
				</div>

			</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>