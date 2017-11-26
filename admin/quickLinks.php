<?
$adir = '';
include('adminCode.php');

list($season, $feature) = explode('_', $_POST[category]);


for($e = 1; $e <= 25; $e++) {
	$theLink = 'http://codegeass.us/episodes/'.$feature.'/'.$season.'_'.$e.'.php';
	$list .= 'Episode '.$e.': <br><a href="'.$theLink.'">'.$theLink.'</a><br><br>';
}

echo '<form method = "post">
<select name="category" onchange = "submit();">
	<option>---</option>
	<option value="1_ss">Season 1 Screenshots</option>
	<option value="1_main">Season 1 Main</option>
	<option value="1_video">Season 1 Videos</option>
	<option value="1_fanlist">Season 1 Fanlists</option>
	
	<option value="2_ss">Season 2 Screenshots</option>
	<option value="2_main">Season 2 Main</option>
	<option value="2_video">Season 2 Videos</option>
	<option value="2_fanlist">Season 2 Fanlists</option>
</select>
</form>';

echo $list; ?>