<?
include($dir.'episodes/episodeCode.php');
include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox);

$ssContent = '<center>'.$nextPreviousButtons.gallery($dir.'episodes/ss/'.$id).
$nextPreviousButtons.'</center>';

$ssContent.= '<table><tr valign="top"><td>'.chatRoom('620', '470').'</td>
<td><a href="'.$links[forum][link].'" title="Anime Forum">
<img src="'.$dir.'img/ad/forumVertical.jpg" alt="Anime Forum"></a>
</td></tr></table>
<br><br>'.randomStuff();

echo $ssContent;

include($dir.'include/bottom.php'); ?>