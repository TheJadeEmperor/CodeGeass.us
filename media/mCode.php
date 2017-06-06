<?php
function songKey($key) {
	$key = str_replace('_v1', '', $key);
	$key = str_replace('_v2', '', $key);
	return $key;
}


?>