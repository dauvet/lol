<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package responsive
 */

get_header(); ?>
<?php
	$event_menu = wp_get_nav_menu_items('Event Menu');
	/*$categories = get_the_category();
	if ($categories){
		$cur_cat = $categories[0];
	}*/
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="sub_wrap">
            <div class="sub_right">
                <div class="subtab2">
                    <?php foreach($event_menu as $item) :?>
                        <?php if($item->object == 'category' && $item->object_id == get_query_var( 'cat' )): ?>
                            <?php wp_nav_menu( array('menu' => 'event-menu' ));  ?>
                        <?php endif; ?>

                    <?php endforeach;?>
                </div>
                <div class="statue">
                    <a href="<?php echo esc_url( home_url( '/trang-chu/' )) ?>" title="">Trang Chủ</a> &gt; <a href="#"><?php echo single_cat_title("", false); ?></a>
                </div>
                <div class="content">
                    <ul class="list_news clearfix">
                        <?php
						$cat = get_category( get_query_var( 'cat' ) );
						global $paged;
						$curpage = $paged ? $paged : 1;
                        $posts_per_page = settings_get('page_posts_of_category_count');
                        if (!$posts_per_page) $posts_per_page = 10;
						$args = array(
							'post_type' => 'post',
							'category_name' =>  $cat->slug,
							'orderby' => 'post_date',
                            'posts_per_page' => $posts_per_page,
							'paged' => $paged
						);
						$query = new WP_Query($args);
                        while ( $query->have_posts()) : $query->the_post() ?>
                            <li>
                                <a class="left" href="<?php the_permalink(); ?>">
									<?php 
										$img = wp_get_attachment_image_src(get_post_thumbnail_id(),array(123,72));
									?>
                                    <img src="<?php echo $img[0]; ?>">
                                </a>
                                <div class="right">
                                    <div class="p-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                    <div class="p-date"><?php echo get_the_date('d-m-Y'); ?></div>
                                    <div class="clear"></div>
                                    <div class="p-content"><?php the_excerpt(); ?></div>
                                </div>
                            </li>
                        <?php endwhile ?>

                    </ul>
					<?php
					if($query->max_num_pages > 1){
						echo '
						<div id="wp_pagination" class="page">';
						if($curpage > 1){
							echo '
							<a class="first page button" href="'.get_pagenum_link(1).'">&laquo;</a>
							<a class="previous page button" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'">&lsaquo;</a>';
						}

						for($i=1;$i<=$query->max_num_pages;$i++)
							echo '<a class="'.($i == $curpage ? 'active ' : '').'page button" href="'.get_pagenum_link($i).'">'.$i.'</a>';
						if($curpage != $query->max_num_pages){
							echo '
							<a class="next page button" href="'.get_pagenum_link(($curpage+1 <= $query->max_num_pages ? $curpage+1 : $query->max_num_pages)).'">&rsaquo;</a>
							<a class="last page button" href="'.get_pagenum_link($query->max_num_pages).'">&raquo;</a>';
						}
						echo '</div>
						';
					}


						wp_reset_postdata();
					?>
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
