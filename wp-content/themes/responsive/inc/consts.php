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
    'facebook_link' => array(
        'title' => __('Facebook Page link', 'responsive'),
        'type' => 'text'
    ),
);

global $home_settings_keys;
$home_settings_keys = array(
    'home_image_link' => array(
        'title' => __('Image Link', 'responsive'),
        'type' => 'text'
    ),
    'home_trailer_youtube_link' => array(
        'title' => __('Trailer Youtube Link', 'responsive'),
        'type' => 'text'
    ),
);