<?php
$dir = '../../';
// include($dir.'media/ending/endCode.php');

$ending = array(
'mosaic_kakera_v1' => array(
	'song' => 'Mosaic Kakera Version 1',
	'name' => 'Mosaic Kakera'
),
'mosaic_kakera_v2' => array(
	'song' => 'Mosaic Kakera Version 2',
	'name' => 'Mosaic Kakera'
),
'shiawase_neiro' => array(
	'song' => 'Shiawase Neiro',
	'name' => 'Shiawase Neiro'
),
'waga_routashi_aku_no_hana_v1' => array(
	'song' => 'Waga Routashi Aku no Hana Version 1'
),
'waga_routashi_aku_no_hana_v2' => array(
	'song' => 'Waga Routashi Aku no Hana Version 2'
),
'yuukyou_seishunka' => array(
	'song' => 'Yuukyou Seishunka'
)
);
 

$count = 1;
foreach ( $ending as $song => $val )
{
	$endContent .= '<td><a href="'.$song.'.php" title="'.$val['song'].'">
	<img src="../gallery/index/'.$song.'.jpg" alt="'.$val['song'].'"></a>
	<br><a href="'.$song.'.php" title="'.$val['song'].'">'.$val['song'].'</a><br /><br /></td>';
	
	if($count % 3 == 0)
		$endContent .= '</tr><tr valign="top">';
	$count ++;


	$responsiveContent .= '<div class="responsiveModule">
	<a href="'.$song.'.php" title="'.$val['song'].'">
	<img src="../gallery/index/'.$song.'.jpg" alt="'.$val['song'].'"></a>
	<br><a href="'.$song.'.php" title="'.$val['song'].'">'.$val['song'].'</a>
	</div>';
} //foreach

echo '<div class="moduleBlack"><h2>Code Geass Endings</h2>
<table width="100%">
	<tr valign="top">'.$endContent.'</tr>
	</table>
</div>';


echo '<div class="moduleBlack"><h2>Code Geass Endings</h2>'.$responsiveContent ;

echo '<br><br>'.randomProducts().'<br><br>';

// include ($dir.'include/bottom.php');	?>	