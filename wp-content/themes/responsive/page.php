<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package responsive
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="sub_wrap">

			<div class="sub_right">
				<?php  $about_menu = wp_get_nav_menu_items('About Menu'); ?>
				<?php foreach($about_menu as $item) :?>
					<?php if($item->object == 'post' && $item->object_id == get_the_ID()): ?>
						<div class="subtab2">
							<?php wp_nav_menu( array('menu' => 'about-menu' ));  ?>
						</div>
					<?php endif; ?>
				<?php endforeach;?>

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
			<div class="sub_left">
				<?php get_sidebar('left'); ?>

			</div>
		</div>


	</main><!-- #main -->
</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
