<?
$dir = '../../';
include($dir.'admin/adminCode.php');

function characters($dir)
{
	$selC = 'select * from chars order by charName';
	$resC = mysql_query($selC) or print(mysql_error());
	
	while($c = mysql_fetch_assoc($resC))
	{
		$char = $c[charName];
	//	echo $char.'/ <br>';
		
		if($char != 'Anya')
		{
			$src = $dir.'characters/Anya/';
			$indexFile = $dir.'characters/'.$char.'/index.php';
			$fanlistFile = $dir.'characters/'.$char.'/fanlist.php';
			$galleryFile = $dir.'characters/'.$char.'/gallery.php';
			
			if(copy($src.'index.php', $indexFile))
				echo 'Copied '.$src.'index.php to '.$indexFile.'<br>';
				
			if(copy($src.'fanlist.php', $fanlistFile))
				echo 'Copied '.$src.'fanlist.php to '.$fanlistFile.'<br>';
				
			if(file_exists($galleryFile))
				if(copy($src.'gallery.php', $galleryFile))
					echo '<br>Copied '.$src.'gallery.php to '.$galleryFile.'<br><br>';
		}
		
		/*
		if(file_exists($char.'/lostpass.php'))
			unlink($char.'/lostpass.php');
		*/
	}
}

if($_POST[characters])
	characters($dir);


?>
<form method=POST>
<input type=submit name=characters value="Update Character Files">
</form>