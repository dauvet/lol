<?php

function dlog($object, $before = '', $after = '')
{
	echo $before;
	echo "<pre>";
	print_r($object);
	echo "</pre>";
	echo $after;
}