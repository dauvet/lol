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
						<?php endwhile; // end of the loop. ?>
                        <?php the_tags('<ul class="post-tags clearfix"><li class="tags-title">' . __('TAGS', 'responsive') . '</li><li>','</li><li>','</li></ul>'); ?>
                            <?php related_post() ?>
                        <?php
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                        ?>
					</div>

				</div>
                    <?php if(event_settings_get('event_category')==$category[0]->term_id): ?>
                        <div class="sub_left">
                            <div class="list_post">
                                <?php
                                $from_date = DateTime::createFromFormat('d-m-Y',event_settings_get('event_show_date_from'))->format('Y/m/d');
                                $to_date = DateTime::createFromFormat('d-m-Y',event_settings_get('event_show_date_to'))->format('Y/m/d');
                                $limit = settings_get('event_posts_count');
                                if (!$limit) $limit = -1;
                                echo do_shortcode("[event_post_list date_from='{$from_date}' date_to='{$to_date}' limit='{$limit}']");
                                ?>
                            </div>
                        </div>
                     <?php else: ?>
                        <div class="sub_left">
                            <?php get_sidebar('left'); ?>
                        </div>
                    <?php endif; ?>
			</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>