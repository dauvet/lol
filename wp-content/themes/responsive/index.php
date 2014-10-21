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
			<div class="desktop">
				<div class="logo" ><img src="<?php echo get_bloginfo('template_url') ?>/images/landing/logo.png"></div>
				<div class="video"><img src="<?php echo get_bloginfo('template_url') ?>/images/landing/video-bg.jpg"></div>
				<div class="menus">
					<div class="buttons-group-left">
						<a href="<?php echo landing_settings_get("ios_jailbreak_link") ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/landing/ios-jail-break-btn.png"></a>
						<a href="<?php echo landing_settings_get("ios_link") ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/landing/ios-btn.png"></a>
						<a href="<?php echo landing_settings_get("android_link") ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/landing/android-btn.png"></a>
					</div>
					<div class="buttons-group-right">
						<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'trang-chu' ) ) ); ?>" rel="home">
							<img src="<?php echo get_bloginfo('template_url') ?>/images/landing/home-btn.jpg" />
						</a>
						<div class="champ-1"><img src="<?php echo get_bloginfo('template_url') ?>/images/landing/champ-1.png" /></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="customers-support"><img src="<?php echo get_bloginfo('template_url') ?>/images/landing/cskh.png" /></div>
			</div>

			<div class="mobile">
				<div id="logo" class="logo"><img src="<?php echo get_bloginfo('template_url') ?>/images/landing/mobile/logo.png"/></div>
				<div id="mini-menu" class="mini-menu">
					<div id="mini-menu-bg" class="mini-menu-bg">
						<img src="<?php echo get_bloginfo('template_url') ?>/images/landing/mobile/menu-bg.png"/>
					</div>
					<div class="mini-menu-content"><?php wp_nav_menu( array( 'theme_location' => 'landing_mobile_menu' ) ); ?></div>
				</div>

				<div id="video" class="video">
					<img class="video-bg" src="<?php echo get_bloginfo('template_url') ?>/images/landing/mobile/video-bg.jpg"/>
				</div>
				<div id="champion_slider" class="champion_slider">
					<?php if ( function_exists( 'soliloquy' ) ) { soliloquy( '97' ); } ?>
				</div>
				<div id="events" class="events-section">
					<div class="events-title"></div>
					<div class="events-content">
						<?php
						$args = array(
							'posts_per_page' => 5,
							'offset'         => 0,
							'category_name'  => 'su-kien',
							'orderby'        => 'post_date',
							'order'          => 'DESC',
							'post_type'      => 'post',
							'post_status'    => 'publish'
						);
						$news_posts_array = get_posts( $args ); ?>
						<ul>
							<?php foreach ( $news_posts_array as $post ) :
								//print_r($post);
								setup_postdata( $post ); ?>
								<li class="content-items">
									<a href="<?php the_permalink(); ?>"><div class="content-title truncate" title-text="<?php the_title() ?>"><?php the_title(); ?></div></a>
									<div class="content-date-modified"><?php echo date('d/m/Y', strtotime($post->post_date)); ?></div>
									<div class="clear"></div>
								</li>
							<?php endforeach;
							wp_reset_postdata();
							?>
						</ul>
					</div>
				</div>

				<div id="buttons" class="buttons-section">
					<?php if(function_exists( 'wpmd_is_ios' ) && wpmd_is_ios()): ?>
						<a href="<?php echo landing_settings_get("ios_link") ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/landing/mobile/ios-btn.png"></a>
					<?php elseif(function_exists( 'wpmd_is_android()' ) && wpmd_is_android()): ?>
						<a href="<?php echo landing_settings_get("android_link") ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/landing/mobile/android-btn.png"></a>
					<?php else: ?>
						<a href="<?php echo landing_settings_get("ios_link") ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/landing/mobile/ios-btn.png"></a>
						<a href="<?php echo landing_settings_get("android_link") ?>"><img src="<?php echo get_bloginfo('template_url') ?>/images/landing/mobile/android-btn.png"></a>
					<?php endif; ?>
				</div>
			</div>
		</main><!-- #main -->
		<div class="clear"></div>
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
