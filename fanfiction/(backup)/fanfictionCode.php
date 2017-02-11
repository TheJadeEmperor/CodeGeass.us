<?
//include all necessary functions such as linkTree(), construction(), and FileName() 
///////////////////////////////////
include($dir.'include/functions.php');
///////////////////////////////////

//////////////////////////////
$fpath = 'about/fanfiction/';
//////////////////////////////
$section[index] = array(
	'meta' => array(
		'tags' => 'code geass fanfiction, code geass stories',
		'title' => 'Code Geass Fanfiction - Fanfics & Short Stories',
		'desc' => 'Code Geass Fanfiction: Once upon a time, our forum had a writing contest 
		to determine who would be the best writer. One of our members came up with this idea, 
		and The Emperor liked it, so he implemented a writing contest. The contest is over and 
		the winner has been decided, but we decided to keep the submitted entries and put them 
		on the website for display.'
	),
	'display' => 'Code Geass Fanfiction',
	'link' => './',
	'leftBox' => '<h1>Code Geass Fanfiction</h1><h2>Fan Submitted Entries</h2>
	<h3>Writing Content Entries</h3>'
);

$linkTree = array(
'root' => array(
	'mode' => 'L',
	'ff' => array(
		'display' => 'Fanfiction',
		'link' => './')
),
'ff' => array(
	'dis' => array(
		'display' => 'Fanfiction Section'),
)
);
 

$selF = 'select * from fanfiction order by author';
$resF = mysql_query($selF) or print(mysql_error());

while($f = mysql_fetch_assoc($resF))
{
//	echo staff($f[author], 'realName'); exit;
	
	$section[$f[file]] = array(
	'meta' => array(
		'tags' => 'code geass fanfiction, '.$f[title],
		'title' => 'Code Geass Fanfiction - '.$f[title],
		'desc' => 'Code Geass Fanfiction: '.$f[title].' - '.shortenText($f[story] , 400)
	),
	'display' => staff( $f[author] , realName)."'s Entry",
	'link' => $f[file].'.php',
	'leftBox' => '<h1>Code Geass Fanfiction</h1><h2>Fan Submitted Entries</h2>
	<h3>'.staff( $f[author] , realName).'\'s Entry</h3>'
	);
	
	$linkTree[ff][$f[file]] = array(
		'display' => ' :: '.staff( $f[author] , realName)."'s Entry",
		'link' => 'fanfiction/'.$f[file].'.php');
}

$linkTree[N] = array(
	'mode' => 'N');


$leftBox = $section[$key][leftBox];
$rightBox = showRightBox($section);	


include($dir.'include/menu.php');

echo displayTitle($leftBox, $rightBox);

$selF = 'select * from fanfiction where file="'.$key.'"';
$resF = mysql_query($selF, $conn) or print(mysql_error());
////////////////////////////////
$f = mysql_fetch_assoc($resF);
////////////////////////////////

if(mysql_num_rows($resF) > 0)
{
	echo div('<h1>'.$f[title].'</h1>');
}  

?>