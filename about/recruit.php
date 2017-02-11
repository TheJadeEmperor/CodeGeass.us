<?php
$dir = '../';
include($dir.'about/aboutCode.php');

$joinText = '<h1>Join our team today!</h1>
<p>As part of our vision to make Refrain the biggest Code Geass website on the internet, we need
your help! Running a conglomerate like this is too much for a small team like us to handle.
We seek the following:</p>
<br>

<p>Writers & Bloggers:</p>
<ul><li>We seek talented writers who can write content for us. These include episode summaries, 
episode reviews, bloggers, and fanfictions. We want those who are well versed with English
or Japanese, and a sense of humor is must.
</li></ul>

<br>
<p>Recruiters:</p>
<ul><li>In order to get the word out about our site, we need more members on our forum.
We seek recruiters who can help us bring in more members to our lively community.
</li></ul>

<br>
<p>Graphics Designers</p>
<ul><li>In order to keep our site looking professional, we need graphics designers to help 
us give us the look that Refrain deserves. If you know Photoshop or have experience 
with graphics, feel free to join.</li></ul>

<br>
<p>Webmasters</p>
<ul><li>If you are a programmmer or web designer and are looking to create a 
website on anime, but do not know where to start, we will be glad to give you a 
subdomain to put your website in.</li>
</ul>';

echo div($joinText);



$howToText = '<h1>How to join:</h1>
<p>If you feel that any of those positions apply to you, then apply today! Hurry, spots
are limited. To join, simply contact one of our 
<a href="'.$dir.'about/staff.php" title = "Refrain Staff">staff members.</a>
You may find them <a href = "about/staff.php" title = "Refrain Staff">here</a>. 
Or, you may contact '.staff(1, 'L').' directly.</p>


<p>If none of those fits you, but you wish to be on the Refrain team anyway,
then contact a staff member or The Emperor to see how you can fit in with us.
If anything you can join our forums and become a part of our lively community.</p>';

echo div($howToText);

echo '<br><br>'.randomStuff().'<br><br>';

echo subscribeNewsletter($conn); 

include($dir.'include/bottom.php'); ?>