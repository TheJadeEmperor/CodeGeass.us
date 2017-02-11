<?php
include($dir.'include/functions.php');

if(file_exists($dir."knightmares/knightmareCode.php"))
	include($dir."knightmares/knightmareCode.php");

 

$codeName = getCode($full_dir);

$meta = array(
	'tags' => "code geass knightmares, knightmare frames",
	'title' => "Code Geass - Knightmare Frames - Gallery");

$leftBox = "<h1>Code Geass Knightmare Frames</h1><h2>Knightmare Gallery</h2>";
$rightBox = knightmareBlock($knightModels);
$content = "This gallery features the following models: ";
switch($codeName)
{
	case "lancelot":
	{
		$leftBox .= "<h3>The Lancelot Gallery</h3>";
		$content .= "Z-01 Lancelot, Lancelot Air Cavalry, Lancelot Conquista, Lancelot Frontier, and Lancelot Albion";
		$genType = "lancelot";
		break;
	}
	case "guren":
	{
		$leftBox .= "<h3>The Guren Gallery</h3>";
		$content .= "Guren Mark-II, Guren Flight Enabled, and Guren S.E.I.T.E.N Eigth Elements";
		$genType = "guren";
		break;
	}
	case "shinkirou":
	{
		$leftBox .= "<h3>The Shinkirou Gallery</h3>";
		$content .= "The Shinkirou";
		$genType = "8th";
		break;
	}
	case "vincent":
	{
		$leftBox .= "<h3>The Vincent Gallery</h3>";
		$content .= "The Vincent, Vincent Commander Type, and Vincent Ward";
		$genType = "7th";
		break;
	}
}//switch
$content = "<table><tr><td><div id = 'content'>".processText($content)."</div></td></tr></table>";

$content .= gallery($dir."knightmares/models/".$codeName."/ss")."";

//set the linkTree display 
$knightMenu[gen][dis][display] = generation($genType);  
$knightMenu[$genType][dis][display] = ":: ".$knightModels[$genType][$codeName][title];
$linkTree = array($knightMenu[root], $knightMenu[gen], $knightMenu[$genType]);


include($dir."include/menu.php");

if(function_exists("displayTitle"))
	echo displayTitle($leftBox, $rightBox);

echo $content;
?>