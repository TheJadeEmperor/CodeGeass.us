<?
$dir = "../";
$full_dir = __FILE__;
include($dir."admin/adminMenu.php");

include($dir."include/episodeList.php");

include($dir."include/downloadList.php");

include($dir."include/settings.php");

echo "<pre>"; print_r($episodeDownloads)."</pre>";

echo "<pre>"; print_r($mod)."</pre>";

//echo "<pre>"; print_r($endDownloads)."</pre>";
?>
