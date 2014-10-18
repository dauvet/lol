<?php
/**
 * The template used for news block content in page-trang-chu.php
 *
 * @package responsive
 */

if(!empty($tabs_array)): ?>
	<div class="news-with-tabs">
		<div class="tabs-section">
			<?php foreach ( $tabs_array as $i => $tab ) :
				$category = get_category_by_slug($tab); ?>
				<a <?php echo ($i == 0) ? "class='active'" : "" ?> href="javascript:void(0);" rel="<?php echo $tab ?>"><div class="tabs-name"><?php echo $category->name ?></div></a>
			<?php endforeach; ?>
		</div>
		<?php foreach ( $tabs_array as $i => $tab ) : ?>
			<div class="content-section" rel="<?php echo $tabs ?>">
				<?php
				$args = array(
					'posts_per_page' => 5,
					'offset'         => 0,
					'category_name'  => $tab,
					'orderby'        => 'post_date',
					'order'          => 'DESC',
					'post_type'      => 'post',
					'post_status'    => 'publish'
				);
				$news_posts_array = get_posts( $args );
				foreach ( $news_posts_array as $post ) :
					setup_postdata( $post ); ?>
					<div class="content-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
					<div class="content-date-modified"><?php the_date('d/m/Y'); ?></div>
					<div class="clear"></div>
				<?php endforeach;
				wp_reset_postdata();
				?>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>