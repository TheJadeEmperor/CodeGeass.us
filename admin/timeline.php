<?php
include('adminCode.php');

$timeLine[0]['welcome email'] = 'welcome email';

$selN = 'select * from newsletter n left join days_to_send d on n.category = d.category
order by n.category';
$resN = mysql_query($selN, $conn) or die(mysql_error());

while($n = mysql_fetch_assoc($resN))
{
	$timeLine[ $n[dateField] ][ $n[category] ] = $n[category];
}

ksort($timeLine);

foreach($timeLine as $day => $news)
{
	$timeTable .='<tr><td>'.$day.'</td>';
	
	foreach($news as $cat)
		$timeTable .= '<td><a href="newsletter.php?cat='.$cat.'">'.$cat.'</a></td>';
	
	$timeTable .= '</tr>';
}

$timeTable = '<table class=thelist cellspacing=0><tr><th> Day </th><th> Newsletter(s) to be sent </th></tr>
'.$timeTable.'</table>';

 
echo   $timeTable;       ?>