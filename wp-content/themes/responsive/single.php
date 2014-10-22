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
					<?php get_sidebar('left'); ?>
					<dl class="adds"><dd><a><img src="<?php echo get_bloginfo('template_url') ?>/images/event/ads.jpg" alt=""></a></dd></dl>
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
					<?php  $about_menu = wp_get_nav_menu_items('About Menu'); ?>
					<?php foreach($about_menu as $item) :?>
						<?php if($item->object == 'post' && $item->object_id == get_the_ID()): ?>
							<div class="subtab2">
								<?php wp_nav_menu( array('menu' => 'about-menu' ));  ?>
							</div>
						<?php endif; ?>
					<?php endforeach;?>
					<div class="statue">
						<a href="#" title="">Trang Chủ</a> &gt; <a href="#">Giới Thiệu</a> &gt; <a href="#"><?php echo get_the_title(); ?></a>
					</div>
					<div class="content">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'single' ); ?>

							<?php //responsive_post_nav(); ?>

                            <?php
                            if ( comments_open() || get_comments_number() ) {
                            comments_template();
                            }
                            ?>
						<?php endwhile; // end of the loop. ?>

					</div>
				</div>

			</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>