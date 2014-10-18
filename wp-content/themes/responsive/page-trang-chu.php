<?php
/**
 * The template for displaying page HOME.
 *
 * @package responsive
 */

get_header("trang-chu"); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="main-content">
			<div class="news-with-tabs-section" rel="1">
				<?php
				$tabs_array = array('tin-tuc','su-kien');
				include(locate_template('partials/content-news-with-tabs.php'));
				?>
			</div>
			<div class="banner-1"><img src="<?php echo get_bloginfo('template_url') ?>/images/home/banner-1.jpg"></div>
			<div class="clear"></div>
		</div>
		<div class="main-content">
			<div class="clip-1">
				<div class="clip-title">TRAILER</div>
				<div class="clip-section">
					<iframe width="370" height="226" src="//www.youtube.com/embed/oO3Eqb5dPm8" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="main-content">
			<div class="news-with-tabs-section" rel="2">
				<?php
				$tabs_array = array('tan-thu','bi-kiep');
				include(locate_template('partials/content-news-with-tabs.php'));
				?>
			</div>
			<div>
				<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Flienminh.mobi%2F&amp;width&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true&amp;appId=1488293541445840" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:258px;" allowTransparency="true"></iframe>
			</div>
			<div class="clear"></div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
