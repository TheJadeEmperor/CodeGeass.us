<?
mysql_select_db('codegeas_fanlist') or die(mysql_error().__LINE__);	

include($dir.'admin/fanlisting/country.php');


if($_POST[country] != '')
	$limit = 'where country = "'.$_POST[country].'"';

$select = 'select * from '.$fanlistName.' '.$limit.' order by country';
$result = mysql_query($select, $conn) or die(mysql_error().__LINE__);

while($m = mysql_fetch_assoc($result))
{
	$list .= '<tr><td>'.$m[name].'</td>
	<td><a href="mailto:'.$m[email].'" title="Email">Email Address</a></td>
	<td><a href="'.$m[url].'" title="Website" rel="nofollow">Website</td>
	<td><a>'.$m[country].'</td></tr>';
}//while


$membersList .= '<form method=POST>
<select name="country" class="country_field" onchange=submit();>
'.$countryOpt.'</select></form>';


if($list != '')
	$membersList .= '<br><br>Members List <table cellspacing="10" class="listing">'.$list.'</table>';
else
	$membersList .= 'No members added yet.';
?>