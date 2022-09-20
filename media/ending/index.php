<?php
include('endCode.php');
 
if($_GET['debug'] == 1) {
	echo __FILE__.' | '.__LINE__.' '.$key." <br> ";
}

//$key needed for song arrays
if(in_array($key, $end)) {
	if($_GET['debug'] == 1) {
		echo __FILE__.' | '.__LINE__.' '.$key." <br> ";
	}

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