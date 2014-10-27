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

				<div class="tabs-name<?php echo ($i == 0) ? " active" : "" ?>"
				     href="javascript:void(0);" rel="<?php echo $tab ?>"
				     see-more-link="<?php echo get_category_link($category->term_id) ?>" ><?php echo $category->name ?></div>

			<?php endforeach; ?>
			<a class="see-more" href="javascript:void(0);">xem thêm >></a>
		</div>
		<?php foreach ( $tabs_array as $i => $tab ) : ?>
			<div class="content-section" rel="<?php echo $tab ?>">
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
				$news_posts_array = get_posts( $args ); ?>
				<?php foreach ( $news_posts_array as $post ) :
					//print_r($post);
					setup_postdata( $post ); ?>
					<div class="content-items">
						<a href="<?php the_permalink(); ?>"><span class="content-title truncate" title-text="<?php the_title() ?>"><?php the_title(); ?></span></a>
						<span class="content-date-modified"><?php echo date('d/m/Y', strtotime($post->post_date)); ?></span>
						<span class="clear"></span>
					</div>
				<?php endforeach;
				wp_reset_postdata();
				?>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
