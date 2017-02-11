<?php
$dir = '../';
include($dir.'about/aboutCode.php');

mysql_select_db('codegeas_smf');

$selS = 'select * from codegeas_refrain.staff s left join smf_members m on s.forum_id = m.ID_MEMBER 
left join smf_attachments a on m.ID_MEMBER = a.ID_MEMBER order by m.ID_MEMBER';
$resS = mysql_query($selS, $conn) or mysql_error();

while($info = mysql_fetch_assoc($resS))
{	
	$staff[ $info[ID_MEMBER] ] = $info;
	$staff[ $info[ID_MEMBER] ][link] = '<a href="'.$links[forum][link].'/index.php?action=profile;u=
	'.$info[ID_MEMBER].'" target="_blank" title="Visit this user">
	<strong>'.$info[realName].'</strong></a>';
	
	$staff[ $info[ID_MEMBER] ][bio] = stripslashes($info[bio]);
}//


$retiredStaff = array(
'vcassa' => array(
	'name' => 'vcassa',
	'title' => 'Former Graphics Designer',
	'email' => 'innocentcateyes@live.com'
),
'Serenity' => array(
	'name' => 'serenityofdarkness',
	'title' => 'Former Writer',
	'email' => 'serenityofdarkness@yahoo.com'
),
);//$retiredStaff


foreach($staff as $mID => $m)
{
	$img = '';
	if($m[staffPage] != 'N' && $m[role] != '')
	{
 		$img = '<img src="'.$links[forum][link].'/index.php?action=dlattach;attach='.$m[ID_ATTACH].';type=avatar" 
	 		alt="'.$m[realName].'" title="'.$m[realName].'">';

		echo '<div class="moduleBlack" id="'.$mID.'"><h2>'.$m[realName].'</h2>
		<table>
		<tr valign="top">
			<td>'.$img.'</td>
			<td>
				<table>
				<tr title="'.$m[realName].'">
					<td>Title: </td><td>'.$m[link].'</td>
				</tr><tr title="'.$m[role].'">
					<td>Role: </td><td>'.$m[role].'</td>
				</tr><tr title="'.$m[emailAddress].'">
					<td>Email: </td><td><input type=button value="'.$m[emailAddress].'"/></td>
				</tr>';

		if($m[MSN] != '')
			echo '<tr title="'.$m[MSN].'"><td>MSN:</td><td><input type="button" value="'.$m[MSN].'"></td></tr>';
		if($m[aim] != '')
			echo '<tr title="'.$m[aim].'"><td>AIM:</td><td><input type="button" value="'.$m[aim].'"></td></tr>';

		if(sizeof($m[alias]) > 0)
		{
			echo '<tr valign="top"><td>Alias:</td><td>';
			foreach($m[alias] as $n => $alias)
				echo $alias.'<br/>';
			echo '</td></tr>';
		}//if

		echo '</table></td></tr><tr><td colspan="3">Biography: '.$m[bio].'</td>
			</tr>
			</table>
		</div><br>';
	}
}//foreach


foreach($retiredStaff as $retired)
{
	$rStaff .= $retired[name].' - '.$retired[title].' - <a href="mailto:'.$retired[email].'">Email</a><br><br>';
}

echo div('<h2>Retired Staff Members</h2>'.$rStaff);


$recruitText =  '<p>Our team is not limited to the above staff members. If you would like to 
join the refrain team, then please contact a staff member or '.staff(1, 'L').' to join. Please refer to
<a href="'.$dir.'about/recruit.php" title="Join the Team">this section</a> on the positions we have 
open.</p>';

echo div($recruitText).'<br><br>';

include($dir.'include/bottom.php');?>