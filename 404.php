<?
include($dir.'include/functions.php');
include($dir.'include/mysql.php');
include($dir.'include/config.php');
include($dir.'include/index.php');
include($dir.'include/menu.php');
?>
<div class="moduleBlack"> <h1>ZOMG! 404 Error!!!</h1>
<table>
<tr valign="top">
    <td>
    <h3>Technical Failure: Page not found</h3> <p>&nbsp;</p>
    Either you typed the wrong URL in the address bar, or the page you have been looking for is no longer   valid. <p>&nbsp;</p>
    Sorry for the inconvenience!! <p>&nbsp;</p>

</td><td>
    <img src="<?=$dir?>img/menu/zomg.jpg" alt="Nina Einstein" title="Nina Einstein" /> 
    </td>
</tr>
</table>

</div>
<p>&nbsp;</p>

<meta http-equiv="refresh" content="4; memories/" />
<?
$joinText = '<h1>Join our team today!</h1>
    <p>As part of our vision to make Refrain the biggest Code Geass website on the internet, we need
    your help! Running a conglomerate like this is too much for a small team like us to handle.
    We seek the following:</p>
    
    <p>Writers & Bloggers:</p>
    <ul><li>We seek talented writers who can write content for us. These include episode summaries, 
    episode reviews, bloggers, and fanfictions. We want those who are well versed with English
    or Japanese, and a sense of humor is a must.
    </li><li>
    We need someone to manage our blog at www.codegeassr.blogspot.com - if you think you have 
    what it takes then go ahead and apply.
    </li></ul>
    
    <br>
    <p>Recruiters:</p>
    <ul><li>In order to get the word out about our site, we need more members on our forum.
    We seek recruiters who can help us bring in more members to our lively community.
    </li></ul>
    
    <br>
    <p>Affiliate Managers:</p>
    <ul><li>In order to get the word out, we need other websites to affiliate with us.
    We will link to their site, and they will link to ours. We need someone who can
    find these anime-related websites and help us grow our network!</li></ul>
    
    <br>
    <p>Webmasters</p>
    <ul><li>If you are a programmmer or web designer and are looking to create a 
    website on anime, but do not know where to start, we will be glad to give you a 
    subdomain to put your website in.</li>
    </ul>';

//echo $joinText;

//echo randomProducts().'<br><br>';
//echo randomStuff().'<br><br>';

include($dir.'include/bottom.php'); ?>