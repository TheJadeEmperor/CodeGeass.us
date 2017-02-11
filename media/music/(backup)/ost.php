<?php
$dir = '../../';
$full_dir = __FILE__;

include($dir.'media/music/musicCode.php');


echo '<table>
<tr valign = "top">
	<td>OST (Original Sound Tracks) List:<br><br>
	'.listSound($ost, 1, 1).'
	</td><td align="center">
<a href="'.$self.'" title="'.$meta[title].'" id="plain">
<img src="'.$dir.'media/music/ost/ost_1.jpg" alt="'.$meta[title].'" title="'.$meta[title].'"/></a>
	</td>
</tr><tr valign="top">
	<td>'.listSound($ost, 1, 2).'
	</td><td>
	<a href="'.$self.'" title="'.$meta[title].'" id="plain"><img src="'.$dir.'media/music/ost/ost_2.jpg"
		alt="'.$title.'" title="'.$title.'"/></a>
	</td>
</tr>
</table>';

$credits = 'Music soundtracks donated by '.$staff[92][link].'. Thank you '.$staff[92][link].' for the contributions.';

echo '<table title="'.$meta[title].'"><tr><td>
'.div($credits).'</td></tr></table>

<br><br><br>';
?>







<?php

echo '<table><tr valign="top"><td>R2 Track 1:<br><br>'.listSound($ost, 2, 1);
echo '<br><br>R2 Track 2:<br><br>'.listSound($ost, 2, 2).'</td></tr></table>'; 


echo '<table><tr><td>';

?>

<div id="content">
Music soundtracks donated by <?=$staff[92][link]?>. Thank you <?=$staff[Luna][link]?> for the contributions. 
</div></td></tr></table>








<? include($dir.'include/bottom.php'); ?>