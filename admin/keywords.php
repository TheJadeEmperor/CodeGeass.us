<?php
include('adminCode.php');

$keywords = array(
'code geass episodes',
'code geass season 1',
'code geass season 2',
'code geass season 3'
);

$frontPage = array(
'code geass r3',
'code geass characters',
'code geass',
'code geass gif',
'code geass fanfiction',
'kallen stadtfeld',
'suzaku kururugi',
'code geass ost',
'code geass wallpaper',
);

$gQuery = 'http://www.google.com/search?q=';

$pageContent =  '<table><tr valign=top><td>
<fieldset><legend align=center>Keywords</legend>';

foreach($keywords as $word)
{
	$term = str_replace(' ', '+', $word);
	
	$pageContent .= '<a href="'.$gQuery.$term.'" target=_blank>'.$word.'</a><br><br>';
}
$pageContent .= '</fieldset>
	</td><td><fieldset><legend align=center>Front page of google</legend>';


foreach($frontPage as $word)
{
	$term = str_replace(' ', '+', $word);
	
	$pageContent .= '<a href="'.$gQuery.$term.'" target=_blank>'.$word.'</a><br><br>';
}
$pageContent .= '</fieldset></td></tr></table>';

echo $pageContent;  ?>