<?php
$dir = '../../';
include('../charsCode.php');

$pageContent = gallery($dir.'characters/'.$charName.'/gallery').'<br><br>
'.forumAd($links).'<br><br>'.randomStuff();

echo $pageContent;

include($dir.'include/bottom.php'); ?>