<?php
$dir = '../../';
include('affiliationCode.php');
	
foreach($orgContent as $url => $org)
{
	if(file_exists($url))
	{
		$content = '<h2 id="'.$url.'">'.$org[name].'</h2>
		<a href = "'.$url.'.php">Click here for more info about '.$org[name].'</a>';
		
		$pageContent .= div(top().$content);
	}
	else
	{
		$content = '<h2 id="'.$url.'">'.$org[name].'</h2>'.$org[profile];
		$pageContent .= div(top().$content).charList($org);	
	}
}//foreach

echo $pageContent;

include($dir.'include/bottom.php'); ?>