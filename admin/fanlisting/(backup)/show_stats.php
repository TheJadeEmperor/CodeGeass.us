<?php
include($dir.'admin/fanlisting/flCode.php');

$country = array();
$pending = 0;
$mCount = 0;
$cCount = 0;

$select = 'select * from '.$fanlistName.' order by added desc';
$result = mysql_query($select, $conn) or mysql_error();

//echo $select; exit;

if($result && mysql_num_rows($result) > 0)
while($row = mysql_fetch_assoc($result))
{
	$mCount ++;//member count

	if($row[pending] != 0)
		$pending++;
	
	//finding unique countries
	if(!in_array($row[country], $country)) 
	{	
		array_push($country, $row[country]); 
		$cCount ++; //unique country count
	}
	
	if($mCount == 1) //newest member (according to date)
		$new .= '<a href="mailto:'.$row[email].'" title="Newest member">'.$row[name].'</a>';
}//

$getOwned = 'select opened from owned where dbtable = "'.$fanlistName.'"';
$resOwned = mysql_query($getOwned, $conn);

$o = mysql_fetch_assoc($resOwned);

list($yy, $mm, $dd) = explode('-', $o[opened]);

$opened = $mm.'-'.$dd.'-'.$yy;


$memberCount = $mCount.', from '.$cCount. ' countries';
$lastUpdated = date('M', time()).' 1st, '.date('Y', time());

$context[fanlist][statsBox] = '<strong>Fanlisting Information:</strong>
<table><tr valign="top"><td>Script used: </td><td>Refrain</td></tr>
<tr valign="top"><td>Opened: </td><td>'.$opened.'</td></tr>
<tr valign="top"><td>Last Updated: </td><td>'.$lastUpdated.'</td></tr>
<tr valign="top"><td>Member count: </td><td>'.$memberCount.'</td></tr>
<tr valign="top"><td>Pending members: </td><td>'.$pending.'</td></tr>
<tr valign="top"><td>Newest members: </td><td>'.$new.'</td></tr></tr>
</table>';
?>