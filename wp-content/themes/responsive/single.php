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
                        <?php $category = get_the_category() ;?>
						<a href="<?php echo esc_url( home_url( '/trang-chu/' )); ?>" title="">Trang Chủ</a> &gt; <a href="<?php echo get_category_link( $category[0]->term_id ); ?>"><?php echo $category[0]->cat_name ?></a> &gt; <a href="#"><?php echo get_the_title(); ?></a>
					</div>
					<div class="content">
						<?php while ( have_posts() ) : the_post(); ?>
                            <?php the_title( '<h1>', '</h1>' ); ?>
							<?php get_template_part( 'content', 'single' ); ?>
                            <?php echo do_shortcode("[bws_related_posts]"); ?>
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