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