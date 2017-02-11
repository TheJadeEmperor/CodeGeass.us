<?
$fanlistName = 'refrain';
include('code.php');

echo '<table><tr valign=top><td>'.whatIsFanlist().'</td><td>'.
showStats($fanlistName, 1).'</td></tr></table>';

echo membersList($fanlistName);

echo updateForm($fanlistName);

echo lostpass($fanlistName);

echo joinForm($fanlistName);

include($dir.'include/bottom.php'); ?>