<?php
// register widgets
add_action( 'widgets_init', 'register_widget_button' );
function register_widget_button(){
	register_widget('Button_Widget');
}
class Button_Widget extends WP_Widget
{
	function Button_Widget(){
		$w_ops=array(
			'classname'=>'widget_button none',
			'description'=>__('Show button widget')
		);
		$this->WP_Widget('button-widget',__('Button widget'),$w_ops);
	}
	function form( $instance ) {


		$title = esc_attr( $instance['title'] );
		$android = isset($instance['android']) ? (bool) $instance['adnroid'] :false;
		$ios_b = isset($instance['ios_b']) ? (bool) $instance['ios_b'] :false;
		$ios_t = isset($instance['ios_t']) ? (bool) $instance['ios_t'] :false;
		?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p>
			<input type="text" class="input" id="<?php echo $this->get_field_id( 'android' ); ?>" name="<?php echo $this->get_field_name( 'android' ); ?>" value="<?php echo $android ?>"/>
			<label for="<?php echo $this->get_field_id( 'android' ); ?>"><?php _e( 'Display as android button' ); ?></label><br />

			<input type="text" class="input" id="<?php echo $this->get_field_id( 'ios_b' ); ?>" name="<?php echo $this->get_field_name( 'ios_b' ); ?>" value="<?php echo $ios_b ?>" />
			<label for="<?php echo $this->get_field_id( 'ios_b' ); ?>"><?php _e( 'Display as iso b button'); ?></label><br />

			<input type="text" class="input" id="<?php echo $this->get_field_id( 'ios_t' ); ?>" name="<?php echo $this->get_field_name( 'ios_t' ); ?>" value="<?php echo $ios_t ?>" />
			<label for="<?php echo $this->get_field_id( 'ios_t' ); ?>"><?php _e( 'Display as ios t button' ); ?></label><br />



		</p>
	<?php
	}


}