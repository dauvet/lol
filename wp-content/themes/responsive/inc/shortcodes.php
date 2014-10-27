<?php

/* post of events shortcode */
add_shortcode( 'subscribe', 'event_post_list' );
function event_post_list($atts)
{
    extract(shortcode_atts(array(
        'date_from' => date('Y-m-d',strtotime('-1 week')),
        'date_to' => date('Y-m-d'),
        'offset' => 0,
        'limit' => -1,
    ), $atts));

    get_posts(array(
        'post_per_page' => $limit,
        'offset' => $offset,
    ));
    ob_start();



    return ob_get_clean();
}