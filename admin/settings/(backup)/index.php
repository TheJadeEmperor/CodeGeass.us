<?
$dir = "../../";
include($dir."admin/adminMenu.php");

//include($dir."include/downloadList.php");
include($dir."include/episodeList.php");

switch($_GET[type])
{
	case "ost1":
	{
		$postContent = "Code Geass - Original Sound Tracks - Track 1 (1 of 4)\n\n";
		foreach($ost[1][1] as $key => $value)
		{			
			$postContent .= $value[display]."\n[url=".$value[midupload]."]".$value[filename]."[/url]\n";
		}//foreach
		break;
	}//	case "ost1":
	case "ost2":
	{
		$postContent = "Code Geass - Original Sound Tracks - Track 2 (2 of 4)\n\n";
		foreach($ost[1][2] as $key => $value)
		{			
			$postContent .= $value[display]."\n[url=".$value[midupload]."]".$value[filename]."[/url]\n";
		}//foreach
		break;
	}//case "ost2":
	case "r2_ost1":
	{
		$postContent = "Code Geass R2 - Original Sound Tracks - Track 1 (3 of 4)\n\n";
		foreach($ost[2][1] as $key => $value)
		{			
			$postContent .= $value[display]."\n[url=".$value[midupload]."]".$value[filename]."[/url]\n";
		}//foreach
		break;
	}//case "ost2":
	case "r2_ost2":
	{
		$postContent = "Code Geass R2 - Original Sound Tracks - Track 2 (4 of 4)\n\n";
		foreach($ost[2][2] as $key => $value)
		{			
			$postContent .= $value[display]."\n[url=".$value[midupload]."]".$value[filename]."[/url]\n";
		}//foreach
		break;
	}//case "ost2":
	case "gallery": //wallpaper & episode galleries
	{
		$postContent = "Code Geass Screenshots Gallery:\n\nSeason 1 Gallery - Includes episodes and Picture Dramas: http://www.midupload.com/refrain09/528/season_1_gallery\nSeason 2 Gallery: Includes episodes and Picture Dramas:http://www.midupload.com/refrain09/693/season_2_gallery\n\nList of 1 Galleries:\n\n";
		foreach($galleryDownloads[1] as $key => $value)
		{
			 $postContent .= "Episode $key: ".$value[filename]."\n";
		}//foreach
		
		$postContent .= "\n\nList of Season 2 Galleries:\n\n";
		foreach($galleryDownloads[2] as $key => $value)
		{
			 $postContent .= "Episode $key: ".$value[filename]."\n";
		}//foreach
		
		break;
	}//	case "gallery": 
	case "r1":
	{
		$postContent .= "Download all season 1 episodes here: http://www.midupload.com/refrain09/529/season_1_episodes\n\nList of season 1 episodes:\n\n";
		foreach($episodeDownloads[1] as $key => $value)
		{
		 	//$postContent .= "Episode $key: [url=".$value[midupload]."]".$value[fileName]."[/url]\n\n";
		 	$postContent .= "Episode $key: ".$value[filename]."\n";
		}//foreach
		
		$postContent .= "\n\nDownload all Picture Dramas here: http://www.midupload.com/refrain09/660/season_1_drama\n\nList of Picture Dramas:\n\n";
		foreach($pictureDrama[1] as $key => $value)
		{
			$postContent .= "Episode $key: ".$value[eng]."\n";
		}
		
		$postContent .= "\n\nDownload all season 2 episodes here: http://www.midupload.com/refrain09/529/season_2_episodes\n\nList of season 2 episodes: \n\n";
		foreach($episodeDownloads[2] as $key => $value)
		{
			//$postContent .= "Episode $key: [url=".$value[midupload]."]".$value[fileName]."[/url]\n\n";
			$postContent .= "Episode $key: ".$value[filename]."\n";
		}//foreach
		
		
		$postContent .= "\n\nDownload all R2 Picture Dramas here: http://www.midupload.com/refrain09/661/season_2_drama\n\nList of R2 Picture Dramas:\n\n";
		foreach($pictureDrama[2] as $key => $value)
		{
			$postContent .= "Episode $key: ".$value[eng]."\n";
		}
		break;
	}//case "r1":
	case "r2": 
	{
		$postContent .= "Download all season 2 episodes here: http://www.midupload.com/refrain09/529/season_2_episodes\n\nList of season 2 episodes: \n\n";
		foreach($episodeDownloads[1] as $key => $value)
		{
			//$postContent .= "Episode $key: [url=".$value[midupload]."]".$value[fileName]."[/url]\n\n";
			$postContent .= "Episode $key: ".$value[filename]."\n\n";
		}//foreach
		break;
	}//case "r2":
}//switch


$type = array(
'ost1' => "OST-Track 1",
'ost2' => "OST-Track 2",
'r2_ost1' => "R2 OST-Track 1",
'r2_ost2' => "R2 OST-Track 2",
'gallery' => "Galleries",
'r1' => "R1 Episodes",
'r2' => "R2 Episodes");


foreach($type as $key => $value)
{
	echo "<a href = \"".$_SERVER[PHP_SELF]."?type=$key\">".$value."</a> :: ";
}//foreach

?>
<br/><br/>
<textarea rows = 20 cols = 80><?=$postContent?></textarea>