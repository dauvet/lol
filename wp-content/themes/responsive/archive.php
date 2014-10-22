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
                    <a href="<?php echo home_url(); ?>" title="">Trang Chủ</a> &gt; <a href="#"><?php echo single_cat_title("", false); ?></a>
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
			<div class="sub_left">
				<?php get_sidebar('left'); ?>
			</div>


		</div>

	</main><!-- #main -->
</div><!-- #primary -->


<?php //get_sidebar(); ?>
<?php get_footer(); ?>
