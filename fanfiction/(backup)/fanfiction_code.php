<?
//include all necessary functions such as linkTree(), construction(), and FileName() 
///////////////////////////////////
include($dir.'include/file.php');
///////////////////////////////////

function generateRightBox($feature)
{
	global  $also_check_out;
	$music = $also_check_out;
	global $dir;
	$piece = array("index", "emperor", "scar", "luna_1", "luna_2", "kidariko");
	
	$show_piece = array_diff($piece, array($feature));//take out the current feature
	
	foreach($show_piece as $sp)
	{
		$right_box .= "<li><a href = \"".$dir.$also_check_out[$sp][link]."\" title = \"".$also_check_out[$sp][title]."\">
		".$also_check_out[$sp][display]."</a></li>";
	}//foreach
	
	return "<p>Also check out:</p><ul>".$right_box."</ul>";
}//function


//get the file name from the url path
$file = FileName($full_dir);


$also_check_out = array(
"index" => array(
	"display" => "Fanfiction Main Menu",
	"title" => "Code Geass Fanfiction",
	"link" => "fanfiction"),
"emperor" => array(
	"display" => "The Emperor's fanfiction",
	"title" => "The Emperor's fanfiction",
	"link" => "fanfiction/emperor.php"),
"scar" => array(
	"display" => "Scar's fanfiction",
	"title" => "Scar's fanfiction",
	"link" => "fanfiction/scar.php"	),
"luna_1" => array(
	"display" => "Luna's Entry (1)",
	"title" => "Luna's fanfiction",
	"link" => "fanfiction/luna_1.php"),
"luna_2" => array(
	"display" => "Luna's Entry (2)",
	"title" => "Luna's fanfiction",
	"link" => "fanfiction/luna_2.php"),
"kidariko" => array(
	"display" => "Kidariko's Entry",
	"title" => "Kidariko's Entry",
	"link" => "fanfiction/kidariko.php"),
);//music


$left_box = "<h1>Refrain: <b>Code Geass</b> Fanfiction</h1>";
switch($file)//customize the settings for each file
{
	case "index.php":
	{
		//meta information - such as keywords, title tag, and description tags
		$meta = array(
			'tags' => "code geass, refrain, fanfiction",
			'title' => "Refrain: Code Geass - Fanfiction - Main Index",
			'desc' => ""
		);
		
		$left_box .= "Main Menu";
		
		$right_box = generateRightBox('index');	
		break;
	}//	case "index.php":
	case "emperor.php":
	{	
	 	$meta = array(
 			'tags' => "code geass, refrain, fanfiction",
			'title' => "Refrain: Code Geass - Fanfiction - Emperor's Entry",
			'desc' => ""
		); 
//echo $meta[title];				
		$left_box .= "<h3>Fan Submitted Entries</h3>The Emperor's Entry";
		
		$right_box = generateRightBox('emperor');	
		break;
	}//case
	case "scar.php":
	{	
		$meta = array(
 			'tags' => "code geass, refrain, fanfiction",
			'title' => "Refrain: Code Geass - Fanfiction - Scar's Entry",
	 		'desc' => "");
 		
		$left_box .= "<h3>Fan Submitted Entries</h3>Scar's Entry";
	
		$right_box = generateRightBox('scar');	
		break;
	}//case
	case "luna_1.php":
	{
		$meta = array(
 			'tags' => "code geass, refrain, fanfiction",
			'title' => "Refrain: Code Geass - Fanfiction - Luna's Entry",
	 		'desc' => "");
			
		$left_box .= "<h3>Fan Submitted Entries</h3>Luna's Entry (1)";
	
		$right_box = generateRightBox('luna_1');	
		break;	
	}//case
	case "luna_2.php":
	{	
		$meta = array(
 			'tags' => "code geass, refrain, fanfiction",
			'title' => "Refrain: Code Geass - Fanfiction - Luna's Entry",
	 		'desc' => "");
		
		$left_box .= "<h3>Fan Submitted Entries</h3>Luna's Entry (2)";
	
		$right_box = generateRightBox('luna_2');	
		break;
	}//case 
	case "kidariko.php":
	{	
		$meta = array(
 			'tags' => "code geass, refrain, fanfiction",
			'title' => "Refrain: Code Geass - Fanfiction - Kidariko's Entry",
	 		'desc' => "");
		
		$left_box .= "<h3>Fan Submitted Entries</h3>Kidariko's Entry";
	
		$right_box = generateRightBox('kidariko');	
		break;
	}//case 
}//switch

$linkTree = array(
'fanfic' => array(
	
),
);


$display_title = "<table width = '100%' title = \"$title\"><tr valign = 'top'>
<td align = 'left'>
	<table title = \"$title\"><tr><td>	
		<div id = 'content' title = \"$title\" align = 'left'>$left_box</div>
	</td></tr></table>
</td><td align = 'right'>
	<div id = 'content' title = \"$title\" align = 'left'>$right_box</div>
</td></tr></table>";	


include($dir."include/menu.php");

echo $display_title;
?>