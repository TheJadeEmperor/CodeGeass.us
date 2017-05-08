<?php
$dir = '../';
include('aboutCode.php');

 
$manga = array(
'lelouch_rebellion' => array(
	'engName' => 'Lelouch of the Rebellion',
	'japName' => 'Hangyaku no Lelouch',
	'author' => 'Ichiro Okouchi',
	'ill' => 'Majiko!',
	'pub' => 'Kadokawa Shoten',
	'eng_pub' => 'Canada United States Bandai Entertainment',
	'demo' => 'Shojo',
	'mag' => 'Monthly Asuka',
	'vol' => '6',
	'desc' => '',
),
'nightmare_of_nunnally' => array(
	'engName' => 'Nightmare of Nunnally',
	'japName' => 'Nightmare of Nunnally',
	'author' => 'Ichiro Okouchi',
	'ill' => 'Takuma Tomomasa',
	'pub' => 'Kadokawa Shoten',
	'eng_pub' => 'Canada United States Bandai Entertainment',
	'demo' => 'Seinen',
	'mag' => 'Comp Ace',
	'vol' => '5',
	'desc' => '<p>With the death of Lelouch, Nunnally goes into freak out mode, but no one actually knows if Lelouch 
	is dead or not. Milly covers up the fact that Lelouch is actually missing by telling everyone that 
	he is studying abroad in Britannia While at school, Nunnally is always being picked on by Britannian 
	nobility because the Ashford’s look after her, but she has a friend named Alice who always seems to 
	save her.</p>
	
	<p>Like in the show there is the Hotel hijacking and the welcome party for the freeloader Arthur, 
	but this time there are two junior members of the student council, Alice and Nunnally. 
	There is Cornelia but no Euphie. So it is Nunnally that is taken to the boss and Alice throne off the 
	hotel, but lives. Welcome to the Geass order. NOW GO READ THE REST OF THE BOOK SO I DON\'T SPOIL IT.
	</p>',
),
'renya_blackness' => array(
	'engName' => 'Renya of the Blackness',
	'japName' => 'Shikkoku no Renya',
),
'suzaku_counterattack' => array(
	'engName' => 'Suzaku of the Counterattack',
	'japName' => 'Suzaku of the Counterattack',
	'author' => 'Ichiro Okouchi',
	'ill' => 'Atsuro Yomino',
	'pub' => 'Kadokawa Shoten',
	'eng_pub' => 'Canada United States Bandai Entertainment',
	'demo' => 'Shojo',
	'mag' => 'Beans Ace',
	'vol' => '2',
	'desc' => '<p>It starts out the same as the manga, goes through the Shinjuku Ghetto and finds Suzaku and C.C., 
	and Suzaku and C.C. are shot, and Lelouch gets his geass. But there are no Knightmare frames. There 
	is the Lancelot, but the Lancelot is a knightmare suite. Suzaku is once again held for the murder of 
	Clovis but is freed by Zero, but does not join him. There is no Cecile only a young girl genus named 
	Mariel, who is similar to Cecile.</p>
	<p>There are some black knights who decide to go against Zero and attack Mariel and her father who helped 
	invent the Knightmare system, killing her father. Suzaku then blamed Zero for it, who arrived later on. 
	Lelouch learns that Suzaku is Zero and Suzaku will never forgive Zero.</p>',
),
);


$content .= '<div class="moduleBlack" title="'.$meta[title].'"><h2>Code Geass Manga</h2><table><tr>';
foreach($manga as $k => $v)
{
	$content .= '<td><a href="#'.$k.'" title="'.$v[engName].'">
	<img src="img/manga/'.$k.'.jpg" alt="'.$v[engName].'"/></a><br>
	<a href="#'.$k.'" title="'.$v[engName].'">'.$v[engName].'</a></td>';
}
$content .= '</tr></table></div>
<br><br>';


foreach($manga as $comic => $stat)
{
	$statTable = top().'<table>
	<tr>
		<td>English Name: </td><td>'.$stat[engName].'</td>
	</tr><tr>
		<td>Japanese Name: </td><td>'.$stat[japName].'</td>
	</tr><tr>
		<td>Author: </td><td>'.$stat[author].'</td>
	</tr><tr>
		<td>Illustrator: </td><td>'.$stat[ill].'</td>
	</tr><tr>
		<td>Publisher: </td><td>'.$stat[pub].'</td>
	</tr><tr>
		<td>English Publisher: </td><td>'.$stat[eng_pub].'</td>
	</tr><tr>
		<td>Demographic: </td><td>'.$stat[demo].'</td>
	</tr><tr>
		<td>Magazine: </td><td>'.$stat[mag].'</td>
	</tr><tr>
		<td>Volumes: </td><td>'.$stat[vol].'</td>
	</tr>
	</table>';
	
	$profile = '<div class="moduleBlack" id="'.$comic.'"><h2>'.$stat[engName].'</h2></div>
	<table><tr valign="top">
	<td>
		<img src="img/'.$comic.'.jpg" alt="'.$stat[engName].'">
	</td><td>'.div( $statTable ).'</td></tr></table>';
	
	if($stat[desc] != '')
		$profile .= div( $stat[desc].'<p> Written by Staff Member</p>' );
	
	$content .= moduleBlack($profile);
}
	
echo $content;

include($dir.'include/bottom.php'); ?>