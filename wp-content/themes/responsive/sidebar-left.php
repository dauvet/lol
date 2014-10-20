
<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
<?php
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('left-sidebar') ) :
	endif;
?>
<?php endif;?>

