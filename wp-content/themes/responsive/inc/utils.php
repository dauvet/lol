<?php
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
);
function dlog($object, $before = '', $after = '')
{
	echo $before;
	echo "<pre>";
	print_r($object);
	echo "</pre>";
	echo $after;
}