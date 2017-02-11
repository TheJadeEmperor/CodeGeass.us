<?php
include('adminCode.php');

///////////////////////////
$tableName = 'subscribers';
///////////////////////////


function addEditForm($s)
{
	if($_GET[e])
	{
		$disAdd = 'disabled';
		$statusSel[ $s[status] ] = 'selected';
		
		$statusType = array(
		'S' => 'S = Subscribed',
		'U' => 'U = Unsubscribed');
		
		foreach($statusType as $sta => $dis)
		{
			$statusOpt .= '<option value="'.$sta.'" '.$statusSel[$sta].'>'.$dis.'</option>';
		}
	}
	else
	{
		$disDel = $disEdit = 'disabled'; 
	}

	$properties = ' type=text class=input size=30';
	
	return '<form name=subscriber method=post>
	<table class=thelist cellspacing=0><tr><th colspan=3>Add / Edit / Subscriber</th></tr>
	<tr>
		<td>email</td><td><input '.$properties.' name=email value="'.$s[email].'"></td>
	</tr><tr>
		<td>joined</td><td><input '.$properties.' name=joined value="'.$s[joined].'"></td>
	</tr><tr>
		<td>origin</td><td><input '.$properties.' name=origin value="'.$s[origin].'"></td>
	</tr><tr>
		<td>status</td><td><select name=status>'.$statusOpt.'</select></td>
	</tr><tr>
		<td colspan=2 align=center><input type=submit name=add value=" Add Subscriber " '.$disAdd.'> 
		<input type=submit name=edit value=" Edit Subscriber " '.$disEdit.'><br><form method=post>
		<input type=submit name="delete" value="Delete Subscriber" onclick="return confirm(\'Are you sure? Deletions are irreversible!\')" '.$disDel.'>
		</td>
	</tr>
	</table></form>';

}

$dbFields = array(
'email'	=> '"'.$_POST[email].'"', 
'joined' => '"'.$_POST[joined].'"',
'origin' => '"'.$_POST[origin].'"',
'status' => '"'.$_POST[status].'"');


if($_POST[add])
{
	if(insertRecord($dbFields, $tableName))
		$msg = 'Successfully added subscriber.';  
	else
		die(mysql_error());
}
else if($_POST[edit])
{
	$set = array();
	foreach($dbFields as $fld => $val)
	{
		array_push($set, $fld.'='.$val);
	}
	
	$theSet = implode(',', $set);
	
	$upd = 'update '.$tableName.' set '.$theSet.' where email="'.$_GET[e].'"';
	if(mysql_query($upd, $conn))
		$msg = 'Successfully updated subscriber with query: '.$upd;
	else
		die(mysql_error());
}
else if($_POST[delete])
{
	$del = 'delete from '.$tableName.' where email="'.$_POST[email].'" limit 1';
	if(mysql_query($del, $conn))
		$msg = 'Successfully deleted subscriber with query "'.$del.'"';
	else
		die(mysql_error());
}


if($_POST[perPage]) //subscribers per page
{
	$_SESSION[perPage] = $_POST[perPage];
	$_GET[p] = 1;
}

if(!isset($_SESSION[perPage]))
	$_SESSION[perPage] = 100; 



if($_GET[p])
{
	$_SESSION[p] = $_GET[p];
}
else
{
	if(!$_SESSION[p])
		$_SESSION[p] = 1;
}

$total = 1; //total # of subscribers
$listCount = 1; //# of pages

$selS = 'select * from '.$tableName.' order by email';
$resS = mysql_query($selS, $conn) or die(mysql_error());

while($m = mysql_fetch_assoc($resS))
{
	if($_GET[e] == $m[email]) //editing this current record
		$s = $m;
	
	if($total % $_SESSION[perPage] == 0) 
	{
		$listCount++;
	}

	$subscribers[$listCount] .= '<tr><td>'.$total.' - <a href="?e='.$m[email].'">'.$m[email].'</a></td>
	<td align=center>'.$m[origin].'</td><td>'.$m[joined].'</td></tr>';
	
	$total++;
}

//the add / edit / delete form
$form = addEditForm($s);

// $_SESSION[perPage] = 100;;

//calculate page numbers
$numPages = ceil($total / $_SESSION[perPage]);

for($p = 1; $p <= $numPages; $p++)
{
	if($_SESSION[p] == $p)
		$page .= '<font size=3><a href="?p='.$p.'">'.$p.'</a></font> ';
	else
		$page .= '<a href="?p='.$p.'">'.$p.'</a> ';
}

//calculate prev page
if($_SESSION[p] == 1)
	$prev = 1;
else
	$prev = $_SESSION[p] - 1;
	
//calculate next page
if($_SESSION[p] == $numPages)
	$next = $numPages;
else
	$next = $_SESSION[p] + 1;
	
$prevPage = '<a href="?p='.$prev.'"><< Prev</a>';
$nextPage = '<a href="?p='.$next.'">Next >></a>';	

$page = '<tr><td colspan=4 align=center>'.$prevPage.' '.$page.' '.$nextPage.'</td></tr>';


//subscriber options
$perPage = array(
'50', '100', '150', '200');

foreach($perPage as $pp)
{
	$sel = '';
	if($_SESSION[perPage] == $pp)
		$sel = 'selected';
	$ppOpt .= '<option value="'.$pp.'" '.$sel.'>'.$pp.'</option>';
}

$subOpt = '<form method=POST><div class=thelist><h2>Subscriber Options</h2>
Subscribers Per Page <select name="perPage" onchange=submit();>'.$ppOpt.'</select>
</div></form>';

//display confirmation message
if($msg)
	echo '<fieldset>'.$msg.'</fieldset>';

//$colArray = array('Email', 'Origin', 'Joined');
	
echo '<table>
<tr valign=top>
	<td>
	<table class=thelist cellspacing=0 cellpading=0><th colspan=4>Subscribers List - Total: '.$total.'</th>
	'.$page.' <tr><td><table class=thelist cellspacing=0 cellpading=0><th>Email</th><th>Origin</th><th>Joined</th>
	'.$subscribers[$_SESSION[p]].'</table></td></tr> '.$page.'</table></td>
	<td>'.$subOpt.'<br> '.$form.'</td>
</tr>
</table>';

?>