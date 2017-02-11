<?php
$dir = '../../';
include($dir.'admin/adminCode.php');

//insert code
if($_POST[insert])
{
	$ins = 'insert into subscription (name, category, subcategory, url, email, username, password) values (
	"'.addslashes( $_POST[name] ).'", "'.$_POST[category].'", "'.addslashes( $_POST[subcategory] ).'", "'.addslashes( $_POST[url] ).'", "'.$_POST[email].'",  "'.$_POST[username].'", "'.$_POST[password].'") ';
	
	$res = mysql_query($ins, $conn) or die(mysql_error().' Line '.__LINE__);
}//if
else if($_POST[update]) //update code
{
	$upd = 'update subscription set
	name = "'.$_POST[name].'",
	url = "'.$_POST[url].'",
	category = "'.$_POST[category].'",
	subcategory = "'.$_POST[subcategory].'",
	email = "'.$_POST[email].'",
	username = "'.$_POST[username].'",
	password = "'.$_POST[password].'"
	where id ="'.$_GET[id].'"';
	
	mysql_query($upd, $conn) or die(mysql_error().' Line '.__LINE__);
	
//	$updateDis = 'disabled';
}//else if
else if($_POST[clear])
{
	unset($_GET[id]);
}

//edit
if($_GET[id])
{
	$getR = 'select * from subscription where id="'.$_GET[id].'"';
	$resR = mysql_query($getR, $conn) or die(mysql_error().' Line '.__LINE__);
	
	$r = mysql_fetch_assoc($resR);
	
	$insertDis = 'disabled';
}//if
else
	$updateDis = 'disabled';


$select[ $r[category] ] = 'selected';
 
$properties = 'type="text" class="input""';

$new = '<form method=POST>
<fieldset><legend align="center">Add New Subscription</legend><table><tr>
	<td>Name:</td><td><input type="text" class="input" name="name" value="'.$r[name].'"  size="35"></td>
</tr><tr>
	<td>URL:</td><td><input '.$properties.' name="url" value="'.$r[url].'" size="40"></td>
</tr><tr>
	<td>Category:</td><td>
	<select name="category">
	<option value="Fanlist" '.$select['Fanlist'].'>Fanlist</option>
	<option value="Forum" '.$select['Forum'].'>Forum</option>
	</select>

	</td>
</tr><tr>
	<td>Subcategory:</td><td><input '.$properties.' name="subcategory" value="'.$r[subcategory].'" size="35"></td>
</tr><tr>
	<td>Acct Email:</td><td><input '.$properties.' name="email" value="'.$r[email].'" size="35"></td>
</tr><tr>
	<td>Username:</td><td><input '.$properties.' name="username" value="'.$r[username].'" size="35"></td>
</tr><tr>
	<td>Pass:</td><td><input '.$properties.' name="password" value="'.$r[password].'" size="35"></td>
</tr><tr>
	<tr><td colspan=2 align=center>
		<input type="submit" name="insert" value="Add" '.$insertDis.'>
		<input type="submit" name="update" value="Edit" '.$updateDis.'>
		</td></tr>
</tr></table></form>

<form method=POST action='.$_SERVER[PHP_SELF].'>
<center><input type="submit" name="clear" value="Reset"></center>
</fieldset>
</form>';	


 
	
//$selectC = 'select ';	
$cat = '<fieldset><table>
<tr valign=top>
	<td>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult">Fanlist - Adult</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Characters0-M">Fanlist - Characters 0 - M</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=CharactersN-Z">Fanlist - Characters N - Z</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Companies">Fanlist - Companies</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Episodes">Fanlist - Episodes</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult">Fanlist - Fanstuff</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult">Fanlist - General</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult">Fanlist - Items / Locations</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult">Fanlist - Magazines</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult">Fanlist - Manga-ka / Directors</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult"> Fanlist - Movies / OVAs</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult">Fanlist - Music</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult">Fanlist - Relationships</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult">Fanlist - Rivalries</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult">Fanlist - Seiyuu</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult">Fanlist - Series</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult">Fanlist - Songs</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult">Fanlist - Toys / Collectibles</a><br/>
		<a href="'.$_SERVER[PHP_SELF].'?category=Fanlist&subcategory=Adult">Fanlist - Websites </a>
	</td><td>
</td>
</tr></table></fieldset>';	
	

if($_GET[category])
{
	$limit = 'where category="'.$_GET[category].'" and subcategory = "'.$_GET[subcategory].'"';     
}

//retrieve code
$selectS = 'select * from subscription '.$limit.' order by category, subcategory, name desc';
$resultS = mysql_query($selectS, $conn) or die(mysql_error().' Line '.__LINE__);

while($rowS = mysql_fetch_assoc($resultS))
{
	if($bgcolor == '#bad6ee') 
		$bgcolor = '#fffaa';
	else
		$bgcolor = '#bad6ee';
	
	$tableContent .= '<tr bgcolor="'.$bgcolor.'"><td><a href="'.$_SERVER[PHP_SELF].'?id='.$rowS[id].'">'.$rowS[category].'</a></td>
	<td><a href="'.$_SERVER[PHP_SELF].'?id='.$rowS[id].'">'.$rowS[subcategory].'</a></td>
	<td><a href="'.$rowS[url].'" target=_blank>'.$rowS[url].'</a></td>
	<td><a href="'.$_SERVER[PHP_SELF].'?id='.$rowS[id].'">'.$rowS[name].'</a></td>
	<td>'.$rowS[username].'</td>
	<td>'.$rowS[email].'</td>
	<td>'.$rowS[password].'</td>
	<td>'.$rowS[refrain].'</td>
	<td>'.$rowS[animefavorite].'</td>
	</tr>';
}//while


$columnHeadItems = array(
'category' => 'Category', 
'subcategory' => 'Subcat', 
'url' => 'URL',
'name' => 'Site Name', 
'username' => 'Username',
'email' => 'Email Used',
'password' => 'Password',
);//$columnHeadItems

$table = tableHeader($columnHeadItems);


$table = '<table cellspacing=0 cellpadding=10 class="thelist"><tr>'.$table.'</tr>'.$tableContent.'</table>';

echo '<br/><br/><table><tr valign=top><td>'.$new.'</td><td>'.$cat.'</td></tr></table>';
echo '<br/><br/>'.$table;
?>