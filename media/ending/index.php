<?php
include('endCode.php');
 

//$key needed for song arrays
if(in_array($key, $end)) {
//	echo $key; 

	if($key == '') {
		include('home.php');
	}
	else {
		echo $content;
	}
}
else {
	http_response_code(404);
	
	//include 404 page from root
	include($dir.'404.php');
	
//	echo __DIR__.' '.__LINE__.' ';
}

include($dir.'include/bottom.php'); ?>