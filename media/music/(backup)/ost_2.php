<?php
$dir = '../../';
$full_dir = __FILE__;

include($dir.'media/music/musicCode.php');



echo '<table><tr valign="top"><td>R2 Track 1:<br><br>'.listSound($ost, 2, 1);
echo '<br><br>R2 Track 2:<br><br>'.listSound($ost, 2, 2).'</td></tr></table>'; 


echo '<table><tr><td>';

?>

<div id="content">
Music soundtracks donated by <?=$staff[92][link]?>. Thank you <?=$staff[Luna][link]?> for the contributions. 
</div></td></tr></table>


<br><br><br>
<? include($dir.'include/bottom.php'); ?>