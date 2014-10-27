<?php
/**
 * responsive Theme Customizer
 *
 * @package responsive
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function responsive_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'responsive_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function responsive_customize_preview_js() {
	wp_enqueue_script( 'responsive_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'responsive_customize_preview_js' );

function lol_widgets_init(){
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'name' => __('Left Sidebar Content'),
			'id' => 'left-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));
	}
	register_widget('Download_Widget');
    register_widget('Collapse_Widget');
}
add_action( 'widgets_init', 'lol_widgets_init' );


/* Tải Button */
class Download_Widget extends WP_Widget
{
	function Download_Widget()
	{
		$widget_ops = array('classname' => 'DownloadWidget', 'description' => 'Displays a button download' );
		$this->WP_Widget('DownloadWidget', 'Button Download', $widget_ops);
	}

	function form($instance)
	{
		$instance = wp_parse_args( (array) $instance, array( 'link-android' => '' ,'link-iosj' => '' ,'link-iosb' => '' ) );
		$linkAndroid = $instance['link-android'];
		$linkIosJ = $instance['link-iosj'];
		$linkIosB = $instance['link-iosb'];
		?>
		<p><label for="<?php echo $this->get_field_id('link-android'); ?>">Link Android: <input class="widefat" id="<?php echo $this->get_field_id('link-android'); ?>" name="<?php echo $this->get_field_name('link-android'); ?>" type="text" value="<?php echo $linkAndroid; ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('link-iosj'); ?>">Link IOS Jailbreak: <input class="widefat" id="<?php echo $this->get_field_id('link-iosj'); ?>" name="<?php echo $this->get_field_name('link-iosj'); ?>" type="text" value="<?php echo $linkIosJ; ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('link-iosb'); ?>">Link IOS Itunes: <input class="widefat" id="<?php echo $this->get_field_id('link-iosb'); ?>" name="<?php echo $this->get_field_name('link-iosb'); ?>" type="text" value="<?php echo $linkIosB; ?>" /></label></p>
	<?php
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['link-android'] = $new_instance['link-android'];
		$instance['link-iosj'] = $new_instance['link-iosj'];
		$instance['link-iosb'] = $new_instance['link-iosb'];
		return $instance;
	}

	function widget($args, $instance)
	{
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$linkAndroid = empty($instance['link-android']) ? ' ' : $instance['link-android'];
		$linkIosJ = empty($instance['link-iosj']) ? ' ' : $instance['link-iosj'];
		$linkIosB = empty($instance['link-iosb']) ? ' ' : $instance['link-iosb'];
		// WIDGET CODE GOES HERE
		?>
			<ul class="subdownload">
				<li><a href="<?php echo $linkAndroid;  ?>" target="_blank"><img src="<?php echo get_bloginfo('template_url') ?>/images/event/download_1.jpg" alt="android"></a></li>
				<li><a href="<?php echo $linkIosJ; ?>" title="iso"><img src="<?php echo get_bloginfo('template_url') ?>/images/event/download_2.jpg"></a></li>
				<li><a title="IOS" href="<?php echo $linkIosB; ?>" target="_blank"><img src="<?php echo get_bloginfo('template_url') ?>/images/event/download_3.jpg"></a></li>
			</ul>
		<?php


		echo $after_widget;
	}

}
/* Collapse Button */
class Collapse_Widget extends WP_Widget
{
    function Collapse_Widget()
    {
        $widget_ops = array('classname' => 'CollapseWidget', 'description' => 'Displays a collapse content');
        $this->WP_Widget('CollapseWidget', 'Collapse Content', $widget_ops);
    }

    function form($instance)
    {
        $instance = wp_parse_args((array)$instance, array('category_name' => ''));
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        $category_name = esc_attr($instance['category_name']);
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></p>

        <p>
            <label for="<?php echo $this->get_field_id('category_name'); ?>"><?php _e('Only from category:'); ?></label>
            <input type="text" value="<?php echo $category_name; ?>"
                   name="<?php echo $this->get_field_name('category_name'); ?>"
                   id="<?php echo $this->get_field_id('category_name'); ?>" class="widefat"/>
            <br/>
            <small><?php _e('Category IDs, separated by commas.'); ?></small>
        </p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>"
                   name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>"
                   size="3"/></p>
    <?php
    }


    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int)$new_instance['number'];
        $instance['category_name'] = strip_tags($new_instance['category_name']);


        return $instance;
    }

    function widget($args, $instance)
    {
        extract($args, EXTR_SKIP);
        /* echo $before_widget;
         */
        ?><!--
        <div id="collapse-widget" data-collapse>
            <h3>Fruits</h3>
            <div>I like fruits. This <a href="#work">link should work</a></div>

            <h3>Info</h3>
            <div>This is some information</div>
        </div>
        --><?php
        /*        echo $after_widget;*/
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
        $category_name = empty($instance['category_name']) ? '' : $instance['category_name'];
        if (empty($instance['number']) || !$number = absint($instance['number']))
            $number = 10;

        $r = new WP_Query(apply_filters('widget_posts_args', array('posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'category__and' => array($category_name), 'ignore_sticky_posts' => true)));
        if ($r->have_posts()) :
            ?>
            <?php echo $before_widget; ?>
            <?php if ($title) echo $before_title . $title . $after_title; ?>
            <ul>
                <?php while ($r->have_posts()) : $r->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink() ?>"
                           title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">

                            <?php if (get_the_title()) the_title(); else the_ID(); ?>
                        </a>

                    </li>
                <?php endwhile; ?>
            </ul>
            <?php echo $after_widget; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();

        endif;
    }

}