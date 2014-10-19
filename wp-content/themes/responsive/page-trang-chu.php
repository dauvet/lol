<?php
/**
 * The template for displaying page HOME.
 *
 * @package responsive
 */

get_header("trang-chu"); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="desktop">
			<div class="main-content">
				<div class="news-with-tabs-section" rel="1">
					<?php
					$words_limit = 10;
					$tabs_array = array('tin-tuc','su-kien','thong-bao','hoat-dong');
					include(locate_template('partials/content-news-with-tabs.php'));
					?>
				</div>
				<div class="banner-1"><img src="<?php echo get_bloginfo('template_url') ?>/images/home/banner-1.jpg"></div>
				<div class="clear"></div>
			</div>
			<div class="main-content">
				<div class="question-title">CÂU HỎI<a class="see-more" href="javascript:void(0);">xem thêm >></a></div>
				<div class="question-section">
					<div class="question-wrapper">
						<div id="question-content-1" class="question-content scrollbar-arrow">
							<?php for($i = 0; $i < 10; $i++): ?>
								<div class="question"><span>Q:</span> Đá linh thạch có tác dụng gì ?</div>
								<div class="answer"><span>A:</span> Dùng để nâng cấp sao cho anh hùng, thấp nhất cấp 1, cao nhất cấp 5.</div>
							<?php endfor; ?>
						</div>
						<div class="question-ask">
							<div class="question-ask-btn"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clip-1">
					<div class="clip-title">TRAILER</div>
					<div class="clip-section">
						<iframe width="370" height="226" src="<?php echo landing_settings_get("youtube_link") ?>" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="main-content">
				<div class="news-with-tabs-section" rel="2">
					<?php
					$tabs_array = array('tan-thu','bi-kiep');
					$words_limit = 13;
					include(locate_template('partials/content-news-with-tabs.php'));
					?>
				</div>
				<div class="facebook-1">
					<div class="facebook-1-title">FACEBOOK</div>
					<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo landing_settings_get("facebook_link") ?>&amp;width=392&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width: 392px; height:210px;" allowTransparency="true"></iframe>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="mobile">

		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
