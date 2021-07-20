<?
$dir = '../';
include('alliesCode.php');

$selA = 'select * from allies order by category, id';
$resA = mysqli_query($selA, $conn) or mysqli_error();

while($rowA = mysqli_fetch_assoc($resA))
{
	$cat = $rowA[category];
	
	$theList[$cat] .= '<td align="left"><a href="'.$rowA[url].'" title="'.$rowA[name].'" rel="nofollow">
	<img src="'.$dir.'allies/banners/'.$rowA[img].'" class="plain"></a><br>
	<a href = "'.$rowA[url].'" title="'.$rowA[name].'" rel="nofollow">'.$rowA[name].'</a>
	<br><br></td>';
	
	$column[ $cat ] ++;   
	if($column[ $cat ] % 5 == 0) //break rows every 5 banners
		$theList[ $cat ] .= '</tr><tr valign="top">';
}//while

echo '<div><fieldset class="fieldBlack">
		<legend align="center"><b>Code Geass</b> Related</legend>
		<table ><tr valign="top">
		'.$theList[code_geass].'
		</table>
	</fieldset>
</div>
<br><br>

<div>
	<fieldset class="fieldBlack">
	<legend align="center">Anime Related Sites</legend>
	<table>
	<tr valign="top">
	'.$theList[anime].'
	</tr>
	</table>
	</fieldset>
</div>
<br><br>';

echo randomStuff().'<br><br>'.forumAd($links).'<br><br>'; 
include($dir.'include/bottom.php'); ?>