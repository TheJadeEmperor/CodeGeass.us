<?
function copyFiles($season)
{
	if($season == 1)
		$start = 2;
	else
		$start = 1;	

	for($e = $start; $e <= 25; $e++)
	{	
		$oldFile = '1_1.php';
		
		$newFile = $season.'_'.$e.'.php';
		
		if(copy($oldFile, $newFile))
			$output .= $oldFile.' => '.$newFile. ': Copy successful.<br/>';
		else
			$output .= $oldFile.' => '.$newFile. ': Copy failed.<br/>';
					
		$output.= '=====================================<br/>';
	}//for
	
	if($season == 1)
		$pictureDrama = array('0.25', '3.25', '4.33', '6.75', '8.75', '9.33', '9.75', '22.25', '23.95');
	else
		$pictureDrama = array('0.56', '0.923', '7.19', '12.31');
	
	foreach($pictureDrama as $dr)
	{
		$oldFile = '1_1.php';
		$newFile = $season.'_'.$dr.'.php';
		
		if(copy($oldFile, $newFile))
			$output .= $oldFile.' => '.$newFile. ': Copy successful.<br/>';
		else
			$output .= $oldFile.' => '.$newFile. ': Copy failed.<br/>';
	}//foreach
	
	return $output;
}//function


echo $display = '<table><tr valign = top><td>Season 1: <br/>'.copyFiles(1).'</td>
<td>Season 2: <br/>'.copyFiles(2).'</td></tr></table>';		
?>