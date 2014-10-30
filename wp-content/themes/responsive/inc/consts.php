<?php

define('LOL_PREFIX', 'lol_');

global $landing_settings_keys;
$landing_settings_keys = array(
    'qrcode_link' => array(
        'title' => __('QR Code link', 'responsive'),
        'type' => 'text'
    ),
    'ios_jailbreak_link' => array(
        'title' => __('iOS Jailbreak Download Link', 'responsive'),
        'type' => 'text'
    ),
    'ios_link' => array(
        'title' => __('iOS iTunes Download Link', 'responsive'),
        'type' => 'text'
    ),
    'android_link' => array(
        'title' => __('Android Download link', 'responsive'),
        'type' => 'text'
    ),
    'youtube_link' => array(
        'title' => __('Youtube Video Clip link', 'responsive'),
        'type' => 'text'
    ),
    'landing_slider' => array(
        'title' => __('Slider', 'responsive'),
        'type' => 'select',
        'object' => get_mastersliders(),
        'object_key' => 'ID',
        'object_value' => 'title'
    )
);

global $home_settings_keys;
$home_settings_keys = array(
    'home_trailer_youtube_link' => array(
        'title' => __('Trailer Youtube Link', 'responsive'),
        'type' => 'text'
    ),
    'home_facebook_link' => array(
	    'title' => __('Facebook Page link', 'responsive'),
	    'type' => 'text'
    ),
    'home_footer_text' => array(
        'title' => __('Footer Text', 'responsive'),
        'type' => 'text'
    ),
    'home_slider' => array(
        'title' => __('Slider', 'responsive'),
        'type' => 'select',
        'object' => get_mastersliders(),
        'object_key' => 'ID',
        'object_value' => 'title'
    ),
    'home_reated_posts_count' => array(
        'title' => __('Number of related posts', 'responsive'),
        'type' => 'text',
    )
);

global $event_settings_keys;
$event_settings_keys = array(
    'event_category' => array(
        'title' => __('Event category', 'responsive'),
        'type' => 'select',
        'object' => get_categories(array(
            'hide_empty' => 0,
        )),
        'object_key' => 'term_id',
        'object_value' => 'name',
    ),
    'event_show_date_from' => array(
        'title' => __('Show posts date from', 'responsive'),
        'type' => 'date',
    ),
    'event_show_date_to' => array(
        'title' => __('Show posts date to', 'responsive'),
        'type' => 'date',
    ),
    'event_show_posts_count' => array(
        'title' => __('Number of posts show', 'responsive'),
        'type' => 'text',
    ),
);