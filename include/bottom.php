<?php

function featuredTrack($dir) {
    global $context;

    $count = 0;//array counter
    for($season = 1; $season <= 2; $season++)//go through each season (1-2)
    {
        for($track = 1; $track <= 2; $track++)//go through each track (1-2)
        {
            if ($handle = opendir($dir.'media/downloads/ost_'.$season.'_'.$track))
            {
                while (false !== ($file = readdir($handle)))    //List all the files
                {
                    if($file != 'Thumbs.db' && $file != '..' && $file != '.')
                    {
                        list($stuff, $ost, $song, $title) = explode('-', $file);

                        list($title, $ext) = explode('.', $title);//remove .mp3 extention from title

                        $song = str_replace("_", "", $song); //clean up song #
                        $title = str_replace("_", " ", $title);//clean up title

                        $trackModule[$count]['key'] = $track.'_'.$song;
                        $trackModule[$count]['season'] = $season;
                        $trackModule[$count]['track'] = $track;
                        $trackModule[$count]['song'] = $song;
                        $trackModule[$count]['title'] = $title;
                        $trackModule[$count]['file'] = $file;
                        $trackModule[$count]['download'] = 'ost_'.$season.'_'.$track;
                        $count++;
                    }//if
                }//while
            }//if
        }//for
        closedir($handle);
    }//for

    $opath = $dir.'images/ost/'; //directory of ost images
    $random = date('h', time()) % $count;//random number
    $featured = $trackModule[$random];//featured track array
    $trackImg = $opath.$featured['season'].'/'.$featured['key'].'.jpg';

    $tContent = '
    <center><p><a '.$popup.' title="'.$featured['title'].'" target="_blank">
    Track '.$featured['track'].'-'.$featured['song'].' - '.$featured['title'].'</a><br>';

    if(file_exists($trackImg))
        $tContent .= '<a href="'.$dir.'media/music/ost.php" target="_blank">
        <p><img src="'.$trackImg.'" alt="'.$featured['title'].'" title="'.$featured['title'].'" class="crosshair"></a></p>';

    $tContent .= '<p><a href="'.$dir.'media/music/ost.php" title="Download this track">Download this track</a>
    <br />
    <a href="'.$dir.'media/music/ost.php" title="View all OSTs">View All OSTs</a></p>';
    
    return $tContent;
}


function topAllies($dir) {    
    $alliesList = array(
		'0' => array(
			'name' => 'Yuri Fan',
			'img' => 'yurifan.net.fanlisting.png',
			'url' => 'http://yurifan.net/fanlisting/' ),
		'1' => array(
			'name' => 'Angel Flower Anime',
			'img' => 'afanime.net.gif',
			'url' => 'http://afanime.net/' ),
		'2' => array(
			'name' => 'Li Xingke: Star in Heaven',
			'img' => 'xingke.radiant-illusion.net.jpg',
			'url' => 'http://xingke.radiant-illusion.net/' ),
		'3' => array(
			'name' => 'Fairy Tale: Guildford and Cornelia',
			'img' => 'fallingslowly.altervista.org.fairytale.jpg',
			'url' => 'http://fallingslowly.altervista.org/fairytale/' ),
		
		'4' => array(
			'name' => "Stage 0",
			'img' => 'stage0.altervista.jpg',
			'url' => 'http://www.stage0.altervista.org/' ),
	 
		'5' => array(
			'name' => 'Zero Requiem: Code Geass R2',
			'img' => 'marheavenj.net.cgr2.jpg',
			'url' => 'http://www.marheavenj.net/cgr2/' ),
		'6' => array(
			'name' => 'Zero\'s Black Knights',
			'img' => 'zero.jpg',
			'url' => 'http://www.fanpop.com/spots/followers-of-zero-of-the-revolutio' ),
		'7' => array(
			'name' => 'The Second Movement: Lelouch Lamperouge',
			'img' => 'fan.sakuradreams.net.jpg',
			'url' => 'http://fan.sakuradreams.net/lelouch' ),
		'8' => array(
			'name' => 'Reincarnation',
			'img' => 'marheavenj.net.reincarnation.jpg',
			'url' => 'http://www.marheavenj.net/reincarnation' ),
		
    ); 
    
    $alliesContent = '<center>
    <table>
    <tr valign="top">
        <td align="left">'.$topAllies.'</td>
    </tr>
    </table> 
    
    <table>
    <tr valign="top">
        <td align="left">';
    
    for($a = 0; $a <= 4; $a++) {
        $name = $alliesList[$a]['name'];
        $alliesContent .= '<a href="'.$alliesList[$a]['url'].'" target="_blank">
        <img src="'.$dir.'allies/banners/'.$alliesList[$a]['img'].'" title="'.$name.'" alt="'.$name.'" class="crosshair"/></a>
        <br />';
    }
            
    $alliesContent .= '</td>
        <td>';
        
    for($a = 5; $a <= 10; $a++) {

        $name = $alliesList[$a][name];
		
		if($name)
			$alliesContent .= '<a href="'.$alliesList[$a]['url'].'" target="_blank">
			<img src="'.$dir.'allies/banners/'.$alliesList[$a]['img'].'" title="'.$name.'" alt="'.$name.'" class="crosshair"/></a>
			<br />';
    }
        
    $alliesContent .= '</td>
    </tr>
    </table> 
    <p><a href="'.$dir.'allies" title="Become an affiliate">Become an affiliate now!</a>
    </p></center>';
    
    return $alliesContent; 
}//function


function featuredAmazon($conn) {   
    mysql_select_db('codegeas_refrain');
    $selP = 'select * from amazon order by series, description';
    $resP = mysql_query($selP, $conn) or print(mysql_error());
    
    $pCount = 0;
    while($p = mysql_fetch_assoc($resP))
    {
        $product[ $pCount ] = $p;
        $pCount ++;
    }
    
    $max = sizeof($product);

    $numA = time() % $max;
    
    $aContent = amazonSearch('').'<center>'.amazonProduct($product[$numA][code]).'
    <br>'.amazonSearch('Visit Amazon').'
    </center>';
        
    return $aContent;
}

?>
</td>
<td width="5px"></td>
<td align="right" width="220">
    <div id="left">

    
    <div class="moduleGreen"><h2>Featured Amazon Product</h2>
        <div><?=featuredAmazon($conn)?></div>
    </div>
        
    <br />

    <div class="moduleGreen" title="Code Geass Sites">
        <a href="<?=$dir?>allies/list.php"><h2>Top Affiliates</h2></a>
        <div><?=topAllies($dir)?></div>
    </div>
    
    <br />
        
    <div class="moduleGreen"><a href="<?$dir?>media/music/ost.php" title="Code Geass OST">
        <h2>Featured Track</h2></a>
        <div><?=featuredTrack($dir)?></div>
    </div>
    
    <br />
   
    <div class="moduleGreen" title="Donate to keep this site running!">
        <h2>Paypal Donations</h2>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <center>
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="NSEMYW3SPFA6S">
            <input type="image" class="crosshair" src="<?=$dir?>images/menu/donate.png" width="220"
            name="submit" alt="Donate Using Paypal" title="Donate to keep this site running!">
            <img alt="Donate to keep this site running!" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" 
            width="1" height="1">   
            <b>Donations keep our site running! </b> 
            </center>
        </form>
    </div>
    
    <br />

    <div class="moduleGreen"><h2>Featured Donators </h2>
        <div>

        <p>Here is a list of people who care about our cause enough to be a featured donator</p>

        <p><a href="mailto:zerooftherevolution@hotmail.com">Zero-</a></p>

        <p><a href="mailto:spaulding24317@gmail.com">Spaulding</a></p>
        </div>
    </div>
    
    <br />  

    <div class="moduleBlack">
        <?php
        echo '
            <a href="'.$dir.'about/fanart" title="The Emperors Birthday"><h2>Best Fanart Ever</h2></a>
            <center>'.popUpImg('images/menu/emp1.jpg', 'images/menu/emp2.jpg', "The Emperor's Birthday").'
            <br /><p>Picture drawn by Kaito_Shion</p></center>';
        ?>
    </div>
     
    </td>
</tr>
</table>
<br /><br />

<div id="page_footer" title="Code Geass">
    <table border="0" width="900px">
        <tr valign="middle">
            <td>
                <table border="0" height="" width="100%">
                    <tr valign="top">
                        <td width="5px"></td>
                        <td id="rights" width="300px">
                            CodeGeass.us &copy; Copyright by BL Web Solutions<br />
                            Concept design by Shadowboy
                        </td><td width="20px"></td>
                        <td>
                            
                            CodeGeass.us belongs to the following directories: <a href="http://www.animefanlistings.org/" title="The Anime Fanlistings" target="_blank" rel="nofollow">TAFL</a>
                            <br />
                            This website is a fan site and is not affiliated with the official series
                            
                        </td><td width="150px">
                        </td>
                        <td align="right" valign="center" rowspan="2">

                            <div id="eXTReMe"><a href="http://extremetracking.com/open?login=geass" target="_blank">
                                <img src="http://t1.extreme-dm.com/i.gif" style="border: 0;"
                                    height="38" width="41" id="EXim" alt="eXTReMe Tracker" /></a>
                                <script type="text/javascript"><!--
                                var EXlogin='geass' // Login
                                var EXvsrv='s10' // VServer
                                EXs=screen;EXw=EXs.width;navigator.appName!="Netscape"?
                                EXb=EXs.colorDepth:EXb=EXs.pixelDepth;EXsrc="src";
                                navigator.javaEnabled()==1?EXjv="y":EXjv="n";
                                EXd=document;EXw?"":EXw="na";EXb?"":EXb="na";
                                EXd.write("<img "+EXsrc+"=http://e1.extreme-dm.com",
                                "/"+EXvsrv+".g?login="+EXlogin+"&amp;",
                                "jv="+EXjv+"&amp;j=y&amp;srw="+EXw+"&amp;srb="+EXb+"&amp;",
                                "l="+escape(EXd.referrer)+" height=1 width=1>");//-->
                                </script><noscript><div id="neXTReMe"><img height="1" width="1" alt="" src="http://e1.extreme-dm.com/s10.g?login=geass&amp;j=n&amp;jv=n" />
                                </div></noscript></div>

                        </td> 
                    </tr> 
                </table>        
            </td>
        </tr>
    </table>
</div>
</div><!--Container-->
</center>

</body>
</html>