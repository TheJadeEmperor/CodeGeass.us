<?php
session_start();


/*Generic database functions*/
function insertRec($cond)
{
	global $conn;
	$tableName = $cond[tableName];
	$dbFields = $cond[fields];
	$values = array();
	
	foreach($dbFields as $field)
	{
		array_push($values, '"'.addslashes($_POST[$field]).'"');
	}
	
	$theFields = implode(', ', $dbFields);
	$theValues = implode(', ', $values);
	
	$ins = 'insert into '.$tableName.' ('.$theFields.') values ('.$theValues.')';
	
	return mysql_query($ins, $conn) or die(mysql_error());
}


function getRec($cond)
{
	global $conn;
	$tableName = $cond[tableName];
	$field = $cond[field];
	$value = $cond[value];
	
	$sel = 'select * from '.$tableName.' where '.$field.'="'.$value.'"';

	$res = mysql_query($sel, $conn) or die(mysql_error());

	return mysql_fetch_assoc($res);
}

function getRecs($cond)
{
	global $conn;
	$order = $cond[order];
	$table = $cond[tableName];
	$r = array();
	
	$sel = 'select * from '.$table;

	if($order != '')
		$sel .= ' order by '.$order;

	$res = mysql_query($sel, $conn) or die(mysql_error());

	while($row = mysql_fetch_assoc($res))
	{
		array_push($r, $row);
	}
	return $r;
}


function updateRec($cond)
{	
	global $conn;
	$table = $cond[tableName];
	$mField = $cond[matchField];
	$mValue = $cond[matchValue];
	$set = array();
	
	foreach($cond[fields] as $field)
	{
		array_push($set, $field.'="'.addslashes($_POST[$field]).'"');
	}
	
	$theSet = implode(',', $set);
	
 	$upd = 'update '.$table.' set '.$theSet.' where '.$mField.'="'.$mValue.'"';
	
	return mysql_query($upd, $conn) or die(mysql_error());
}


if($_SESSION[login] == '')
	header('Location: ./');

$dir = $adir.'../';
include($dir.'include/functions.php');	
include($dir.'include/mysql.php');  
include($dir.'include/config.php');  
include($dir.'include/index.php');  


$menuSite = array(
'bar' => array(
	'link' => '../',
	'title' => 'Main Site'),
'item' => array(
	'Episode List' => array(
		'link' => $adir.'site/episodes.php',
		'title' => 'Episode Titles'),
	'Summaries' => array(
		'link' => $adir.'site/summary.php?epID=2_1',
		'title' => 'Episode Titles'),
	'Synopsis' => array(
		'link' => $adir.'site/synopsis.php?epID=2_1',
		'title' => 'Episode Titles'),

	'Products' => array(
		'link' => $adir.'products.php',
		'title' => 'Amazon Products' ),	
	'Character Profiles' => array(
		'link' => $adir.'site/editChars.php',
		'title' => 'Character Profiles'),
	'Knightmares' => array(
		'link' => $adir.'site/generation.php',
		'title' => 'Knightmare Frames & Generations')
)
);

$menuAff = array( 
'bar' => array(
	'link' => $adir.'site/affiliate.php',
	'title' => 'Management'),
'item' => array(
	'Affiliates' => array(
		'link' => $adir.'affiliate.php',
		'title' => 'Affiliates'),
	'Database List' => array(
		'link' => $adir.'databaseList.php',
		'title' => 'Database List' ),
	'Links & Images' => array(
		'link' => $adir.'links.php',
		'title' => 'Global Links' ),
	'Owned Fanlists' => array(
		'link' => $adir.'fanlist/',
		'title' => 'Owned Fanlistss'),

)
);



$fanlistButtons = '<a href="owned.php"><input type=button value=" Owned Fanlists "></a>
<a href="templates.php"><input type=button value=" Edit Templates "></a>
<a href="members.php"><input type=button value=" All Members "></a>';

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head><title>'.$meta[title].'</title>
<link href="'.$dir.'include/admin.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" type="image/png" href="../include/img/geass_hov.gif"/>';

echo '<script type="text/javascript">
function popUp(URL, width, height) {
	window.open(URL, "", "menubar=no, scrollbars=yes, resizable=yes, left=0, top=0, width="+width+", height="+height);
}
</script>
</head>';

echo '<body><center>
<table>
<tr valign="top">
<td align="left" width="150px">
	'.showMenu($menuSite).'<br> '.showMenu($menuAff).'<br>
</td><td align="left">'; 
?>