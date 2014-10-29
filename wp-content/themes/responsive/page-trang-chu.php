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
                $words_limit = 10;
                $tabs_array = array('tin-tuc','su-kien','thong-bao');
                include(locate_template('partials/content-news-with-tabs.php'));
                ?>
            </div>
            <div class="banner-1">
	            <?php masterslider(landing_settings_get("home_slider")); ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="main-content">
            <h2 class="question-title">CÂU HỎI<!--a class="see-more" href="javascript:void(0);">xem thêm >></a--></h2>
            <div class="question-section">
                <div class="question-wrapper">
                    <div id="question-content-1" class="question-content scrollbar-arrow">
                        <?php $qas = get_posts(array('post_type'=>'qa')); ?>
                        <?php foreach($qas as $qa):
                            setup_postdata( $qa );
                            ?>
                            <!--								<pre>--><?php //print_r($qa) ?><!--</pre>-->
                            <div class="question"><?php echo $qa->post_title; ?></div>
                            <div class="answer"><?php the_content() ?></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="question-ask desktop">
                        <div id="question-ask-modal" class="question-ask-modal" style="display: none;">
                            <div class="question-ask-modal-title">Câu hỏi</div>
                            <?php echo do_shortcode( '[contact-form-7 id="188" title="Contact form 1"]' ); ?>
                        </div>
                    </div>
                    <div class="clear"></div>

                </div>
                <a class="fancybox-modal question-ask-a" href="#question-ask-modal"><div class="question-ask-btn" ></div></a>
            </div>
            <div class="clip-1">
                <h2 class="clip-title">TRAILER</h2>
                <div class="clip-section">
                    <iframe width="100%" height="100%" src="<?php echo landing_settings_get("home_trailer_youtube_link") ?>" frameborder="0" allowfullscreen></iframe>
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
                <h2 class="facebook-1-title">CỘNG ĐỒNG</h2>
                <iframe id="facebook-1-desktop" class="desktop" src="//www.facebook.com/plugins/likebox.php?href=<?php echo landing_settings_get("home_facebook_link") ?>&amp;width=392&amp;height=258&amp;colorscheme=dark&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width: 392px; height:210px;" allowTransparency="true"></iframe>
                <iframe id="facebook-1-mobile" class="mobile" src="//www.facebook.com/plugins/likebox.php?href=<?php echo landing_settings_get("home_facebook_link") ?>&amp;colorscheme=dark&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width: 100%; allowTransparency="true"></iframe>
            </div>
            <div class="clear"></div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
