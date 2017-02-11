<?
$dir = "../";
include($dir.'media/mediaCode.php');

function listGallery($galleryDownloads, $s)
{
	global $dir;
	foreach($galleryDownloads as $key => $value)
	{
		//replace leading zeros
		if(substr($key, '0', '1') == 0)
			$key = substr($key, '1', '2');
	
		$content .= '<tr><td><a href="'.$dir.'episodes/ep_'.$s.'_'.$key.'/ss.php" title="Screenshots Gallery">Episode '.$key.'</a></td>
		<td width="20px"></td>
		<td><a href="'.$dir.'episodes/ep_'.$s.'_'.$key.'/ss.php" title="Screenshots Gallery">View Gallery</a></td>'.'
		<td width="20px"></td>
		<td><a href="'.$value[midupload].'" title="Episode '.$key.' Gallery" target=_blank>Download Gallery</a></td>
		<td width="20px"></td>
		<td><a href="'.$value[midupload].'" title="Episode '.$key.' Gallery" target=_blank>'.$value[filename].'</a></td></tr>';
	}//foreach
	return $content = '<table>'.$content.'</table>';
}//function	
	
echo listGallery($galleryDownloads[1], 1)."<br/><br/>".listGallery($galleryDownloads[2], 2);

randomProducts();
include($dir.'include/bottom.php');?>