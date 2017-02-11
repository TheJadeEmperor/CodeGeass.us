<?
$dir = '../';
include('fanfictionCode.php');

$text = '<p>Once upon a time, our forum had a writing contest to determine who 
would be the best writer. One of our members came up with this idea, and The Emperor 
liked it, so he implemented a writingcontest. The contest is over and the winner 
has been decided, but we decided to keep the submitted entries and put them on the 
website for display.</p>

<p>If you have some time to kill, then browse our fanfiction section and sit 
back, relax, and begin reading!</p>

Currently featured entries:';

echo div($text);

$selF = 'select * from fanfiction order by author';
$resF = mysql_query($selF) or print(mysql_error());
while($fan = mysql_fetch_assoc($resF))
{
	echo div(staff( $fan[author] , 'realName').'<br><a href="'.$fan[file].'.php" 
	title="'.$fan[title].'">'.$fan[title] ).'<br>';
}

//echo '<pre>'.$f.'</pre>';

echo forumAd($links).'<br><br>'.randomStuff().'<br><br>'; 

include($dir.'include/bottom.php'); ?>