<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package responsive
 */

	get_header("landing"); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="logo" ></div>
			<div class="video"></div>
			<div class="menus">
				<div class="buttons-group-left">
					<a href="<?php echo landing_settings_get("ios_jailbreak_link") ?>">
						<div class="buttons-left">
							<img src="<?php echo get_bloginfo('template_url') ?>/images/landing/ios-jail-break-btn.png">
						</div>
					</a>
					<a href="<?php echo landing_settings_get("ios_link") ?>">
						<div class="buttons-left">
							<img src="<?php echo get_bloginfo('template_url') ?>/images/landing/ios-btn.png">
						</div>
					</a>
					<a href="<?php echo landing_settings_get("android_link") ?>">
						<div class="buttons-left">
							<img src="<?php echo get_bloginfo('template_url') ?>/images/landing/android-btn.png">
						</div>
					</a>
				</div>
				<div class="buttons-group-right">
					<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'trang-chu' ) ) ); ?>" rel="home">
						<img src="<?php echo get_bloginfo('template_url') ?>/images/landing/home-btn.jpg" />
					</a>
					<div class="champ-1"><img src="<?php echo get_bloginfo('template_url') ?>/images/landing/champ-1.jpg" /></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="customers-support"><img src="<?php echo get_bloginfo('template_url') ?>/images/landing/cskh.png" /></div>
		</main><!-- #main -->
		<div class="clear"></div>
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
