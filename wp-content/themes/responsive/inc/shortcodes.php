<?php

/* post of events shortcode */
add_shortcode( 'event_post_list', 'event_post_list' );
function event_post_list($atts)
{
    global $wp_query;
    extract(shortcode_atts(array(
        'date_from' => date('Y-m-d',strtotime('-1 week')),
        'date_to' => date('Y-m-d'),
        'offset' => 0,
        'limit' => -1,
    ), $atts));

	$args = array(
		'date_query' => array(
			array(
				'after'     => $date_from . ' 0:0:0',
				'before'    => $date_to . '23:59:59',
				'inclusive' => true,
			),
		),
		'offset' => $offset,
		'posts_per_page' => $limit,
		'orderby' => 'post_date',
		'order' => 'desc'
	);
    $posts = get_posts($args);
    
	ob_start();
	
	if ($posts):
	?>
	
	<ul>
		<?php foreach($posts as $post): ?>
		<li <?php if ( $post->ID == $wp_query->post->ID ) { echo ' class="current"'; } else {} ?>><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></li>
		<?php endforeach; ?>
	</ul>
	<?php
	endif; 
    return ob_get_clean();
}
