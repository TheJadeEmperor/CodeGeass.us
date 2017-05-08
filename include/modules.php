<?php

/*gallery.php
Displays a gallery of images based on hoverbox.css
Requirements:
    A js function called popUp and a file called popUp.php  
    Two directories of images, called big and small
        small - thumbnails of images
        big - actual size of images
    Small and big folders must have matching image files
    Files must be named (1).ext, (2).ext, and so on...
    $directory - pass in the directory relative to popUp.php (not the file itself)
*/

//display page numbers at top and bottom
function page_number($numPages, $n, $page)
{
    //num_pages = total number of pages
    //n = number of images
    //page = current page number
    
    if($page == '') $page = 1;  //declare first page
    
    //Go to first page
    $pageNumbers .= '<a href="?n='.$n.'&p=1#gallery" title="First Page"> << First </a>';
    
    //Go to previous page
    if($page == 1)
        $pageNumbers .= '<< Prev ';//nothing before first page
    else
        $pageNumbers .= '<a href="?n='.$n.'&p='.($page-1).'#gallery" title="Previous Page"><< Prev</a> ';

    for($p = 1; $p <= $numPages; $p++)//$p = iterator
    {
        if($page == $p) //current page
            $pageNumbers .= '<a href="?n='.$n.'&p=$p#gallery" title="Page '.$p.'">
            <font size=5><b>'.$p.'</b></font></a> ';
        else    //not current page
            $pageNumbers .= '<a href="?n='.$n.'&p='.$p.'#gallery" title="Page '.$p.'">'.$p.'</a> ';
    }//for
    
    //Go to next page
    if($page == $numPages)
        $pageNumbers .= ' Next >>';//nothing after last page
    else
        $pageNumbers .= ' <a href="?n='.$n.'&p='.($page+1).'#gallery" title="Next Page">Next >></a>';
    //last page
    $pageNumbers .= ' <a href="?n='.$n.'&p='.$numPages.'#gallery" title="Last Page"> Last >> </a>';
    
    return $pageNumbers;
}//function


function gallery($directory)//
{    
    global $context; 
    $dir = $context[dir];
    
    $big = 1;   //big images
    if ($handle = opendir($directory.'/big'))   //read all files in directory
    {   
        //List all the files
        while (false !== ($file = readdir($handle)))
        {
            if($file != 'Thumbs.db' && $file != ".." && $file != ".")
                $big++;         //increment counter
        }//while
        closedir($handle);
    }//if
    
    $s = 1; //small images
    if ($handle = opendir($directory.'/small')) //read all files in directory
    {   
        //List all the files
        while (false !== ($file = readdir($handle)))
        {
            if($file != 'Thumbs.db' && $file != '..' && $file != '.')
            {   
                $small[$s] = $file;
                $s++;               //increment counter
            }
        }//while
        closedir($handle);
    }//if
    
    if($_POST[num_images])
    {
        $_GET[n] = $_POST[num_images];
        $sel[ $_GET[n] ] = 'selected';
    }
    else if($_GET[n])
    {   
        $sel[ $_GET[n] ] = 'selected';
    }
    else
    {
        $sel[20] = 'selected';  //default images per page
        $_GET[n] = 20;
    }//

 
    //show drop down list and signature
    $galleryContent .= '<div class="moduleBlack" id="gallery"><h2>'.$context[meta][title].' | Image Gallery</h2>
    <table>
    <tr valign="top">
        <td>
            <form method="post">
            Images per page: <select name="num_images" onchange="submit();">
            <option value="10" '.$sel[10].'>10</option>
            <option value="20" '.$sel[20].'>20</option>
            <option value="50" '.$sel[50].'>50</option>
            <option value="70" '.$sel[70].'>70</option>
            <option value="100" '.$sel[100].'>100</option>
            </select>
            </form>
        </td><td width="10px"></td>
        <td>Click on thumbnail to view full sized image in new window.<br>
        Click on the image again to close the window.       </td>
    </tr>
    </table>';

    //total images
    $total = $big - 1;
    $num_pages = 1;

    if($_GET[n] > 0)    //determine number of pages
        $num_pages = ceil($total/$_GET[n]);
    else
        $_GET[n] = $total;//one page

    $galleryContent .= '<center>'.page_number($num_pages, $_GET[n], $_GET[p]).'<br><br><br>
    
    <table><tr valign="top"><td><ul class="hoverbox">';
    
    if($_GET[p] == '')//first page
    {   //first and last image of each page
        $first = 1;
        $last = $_GET[n];

        if($last > $total)
            $last = $total;
    }//if
    else    //all other pages
    {   //first and last image of each page
        $first =  ($_GET[n] * ($_GET[p] - 1)) + 1; 
        $last = $_GET[n] * $_GET[p];    
        if($last > $total)
            $last = $total;
    }//else
    
    for($w = $first; $w <= $last; $w++)
    {   
        foreach($small as $picture)
        {
            list($name, $ext) = explode('.', $picture); 
            
            $imgDir = str_replace('../', '', $directory);
                    
            if($name.'.'.$ext == "($w).jpg" || $name.'.'.$ext == "($w).png")
            {               
                $thisImg = $directory.'/small/'.$name.'.'.$ext;
                
                list($width, $height, $type, $attr) = getimagesize($thisImg);
                
                if($height > $width)
                    $class = 'tall';
                else
                    $class = 'preview'; 
                
                $galleryContent .= "<li><a href=\"javascript:popUp('".$dir."include/popUpImg.php?file=".$imgDir.'/big/'.$picture.'\')">
                <img src="'.$directory.'/small/'.$picture.'" alt="Code Geass Image">
                <img src="'.$directory.'/small/'.$picture.'" class="'.$class.'" alt="Code Geass Image" title="Code Geass Image">
                </a></li>'; 
            }//if           
        }//foreach
    }//for
    
    $galleryContent .= '</ul></td>
    </tr></table><br>'.page_number($num_pages, $_GET[n], $_GET[p]).'<br><br>
    Gallery script developed by <a href="mailto:'.$supportEmail.'&subject=Code Geass Gallery" 
    title="The Emperor">The Emperor</a></center><br></div>';
    
    return $galleryContent;
}


/*
parameters for $opt:
'src' => string of video,
'videoType' => youtube | stageVu | megaVideo,
'source' => source of video,
'width' => width of video,
'height' => height of video,
'videoText' => extra text
*/

function videoModule($opt)
{
	global $context;
	$links = $context[links];
	
	switch($opt[videoType])
	{
	case 'megaVideo':
		$videoLink = 'http://www.megavideo.com/?v='.$opt[src];
		$embedCode = embedMegaVideo($opt[src], $opt[width], $opt[height]);	
		break;
	case 'stageVu':
		$videoLink = 'http://stagevu.com/video/'.$opt[src];
		$embedCode = embedStageVu($opt[src], $opt[width], $opt[height]);	
		break;
	case 'youtube':
	default:
		$videoLink = 'http://www.youtube.com/watch?v='.$opt[src];
		$embedCode = embedYoutube($opt[src], $opt[width], $opt[height]);
		break;
	}

	return '<div class="moduleBlack"><table id="video">
	<tr valign="top">
		<td>'.$embedCode.'
    		<table>
            <tr valign="top">
                <td>
                <fieldset>
                <table>
                <tr>
                    <td colspan="2">Source: '.$opt[source].'<br />
                    <a href="mailto:admin@codegeass.us" title="Contact The Emperor" 
                    class="downloadLink"><span>Report broken link</span></a></td>
                </tr><tr>
                    <td>Link: </td><td><input type="text" value="http://www.youtube.com/watch?v='.$opt[src].'"
                    onclick="this.select();" size="75" class="input"></td>
                </tr><tr>
                    <td>Embed: </td><td><input type="text" value=\''.$embedCode.'\' onclick="this.select();" size="75" class="input"></td>
                </tr>
                </table>
                </fieldset>
                </td>
            </tr>
            </table>
        	
		</td>
		<td>
		<a href="'.$links[clixsenseReferral][link].'" title="Make Money with Clixsense" 
		rel="nofollow" target="_blank"><img src="'.$context[dir].'images/ad/clixsenseVertical.gif" alt="Clixsense" title="Make Money with Clixsense" />
		</a></td>
	</tr>
	</table>
	
	</div>';
}

function embedMegaVideo($string)
{
	$width = "560";
	$height = "340";
	return "<object width='$width' height='$height'><param name='movie' value='http://www.megavideo.com/v/$string'>
	</param><param name='allowFullScreen' value='true'></param><embed src='http://www.megavideo.com/v/$string' 
	type='application/x-shockwave-flash' allowfullscreen='true' width='$width' height='$height'></embed></object>";
}//function


function embedStageVu($src, $width, $height)
{
	return '<iframe style="overflow: hidden; border: 0; width: '.$width.'px; height: '.$height.'px;"
	src="http://stagevu.com/embed?width='.$width.'&amp;height='.$height.'&amp;background=000&amp;uid='.$src.'" 
	scrolling="no"></iframe>';
}//function


function youtubeModule($source, $width, $height)
{	
	global $dir, $links;
	
	$embedCode = '<object width="'.$width.'" height="'.$height.'"><param name="movie" 
	value="http://www.youtube.com/v/'.$source.'=en_US&fs=1&"></param>
	<param name="allowFullScreen" value="true"></param>
	<param name="allowscriptaccess" value="always"></param>
	<embed src="http://www.youtube.com/v/'.$source.'&hl=en_US&fs=1&" type="application/x-shockwave-flash" 
	allowscriptaccess="always" allowfullscreen="true" width="'.$width.'" height="'.$height.'"></embed></object>';
	
    if($height < 350)
    {
        $bottomBox = '<table width="100%">
            <tr valign="top">
            <td>
                <fieldset>
                
                <br /><a href="'.$links[downloadPage][link].'" title="'.$links[downloadPage][title].'" class="downloadLink">
                [Download] Free Code Geass Stuff</a><br /><br />
                 
                </fieldset>
            </td>
            <td>
                <fieldset>
                <br /><a href="'.$links[clixsenseReferral][link].'" class="downloadLink" target=_blank>Join Clixsense and earn some extra money!</a><br /><br />
                </fieldset>
            </td>
            </tr>
            </table>';
    }
    else
        $bottomBox = '';
    
	return '<table id="video">
	<tr valign="top">
		<td>
    		'.$embedCode.' <br />
    		
            <table width="100%">
            <tr valign="top">
                <td>
                    <fieldset>
                    <table>
                    <tr>
                        <td colspan="2">
                        <a href="mailto:'.staff(1, 'emailAddress').'" title="Contact The Emperor" 
                        class="downloadLink">Report broken link</a></td>
                    </tr><tr>
                        <td>Link: </td>
                        <td><input type="text" value="http://www.youtube.com/watch?v='.$source.'"
                        onclick="this.select();" size="60" class="input"></td>
                    </tr><tr>
                        <td>Embed: </td>
                        <td><input type="text" value=\''.$embedCode.'\' onclick="this.select();" 
                        size="60" class="input"></td>
                    </tr>
                    </table>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                '.$bottomBox.'
                </td>
            </tr>
            </table>
            		 
		</td>
		<td>
    		<a href="'.$links[clixsenseReferral][link].'" title="Make Money with Clixsense" 
    		rel="nofollow" target="_blank"><img src="'.$dir.'images/ad/clixsenseVertical.gif" 
    		alt="Clixsense" /></a>
		</td>
	</tr>
	</table>
';
}//


function randomBlock($number)
{
	global $module;

	switch( rand() % 2 )//random feature
	{
		case 0:
		case 1:
			$feature = 'ss';
			break;
		case 2:
		default: 
			$feature = 'video';
			break;
	}//switch	

	if($number == 0) $number = 1;
	
	return $module[$number][$feature];
}//function



function randomStuff()	//Display pieces of random things from the show
{
	global $module, $conn, $dir;

	$total = 0;
	$selE = 'select epID from episodes order by episode asc';
	$resE = mysql_query($selE, $conn) or die(mysql_error());
	
	while($tv = mysql_fetch_assoc($resE))
	{
		$id = $tv[epID];
		list($season, $episode) = explode('_', $id);
		
		if($season == 2)
			$extra = 'R2 ';
		else
			$extra = '';
			
		$module[$total] = array(
		'ss' => array(
			'img' => $dir.'episodes/ss/'.$id.'/index/ss.jpg',
			'link' => $dir.'episodes/ss/'.$id.'.php',
			'caption' => $extra.'Episode '.$episode.' Screenshots'
		),
		'video' => array(
			'img' => $dir.'episodes/ss/'.$id.'/index/video.jpg',
			'link' => $dir.'episodes/video/'.$id.'.php',
			'caption' => $extra.'Episode '.$episode.' Video'
		));
		$total ++;
	}
	
	$randomA = date('h', time()) % $total;
	$blockA = randomBlock($randomA);
	
 	$randomB = (date('h', time()) + rand()) % $total;
	$blockB = randomBlock($randomB);
	
	$randomC = (date('h', time())/rand()) % $total;
	$blockC = randomBlock($randomC);
	
	return '<div class="moduleBlack" title="Random Code Geass Stuff">
	<h2>Random Code Geass Stuff</h2>
	<fieldset>
	<table cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<a href="'.$blockA[link].'" title="'.$blockA[caption].'">
			<img src="'.$blockA[img].'" alt="'.$blockA[caption].'" width="213" height="146"></a>
		</td><td>
			<a href="'.$blockB[link].'" title="'.$blockB[caption].'">
			<img src="'.$blockB[img].'" alt="'.$blockB[caption].'" width="213" height="146"></a>
		</td><td>
			<a href="'.$blockC[link].'" title="'.$blockC[caption].'">
			<img src="'.$blockC[img].'" alt="'.$blockC[caption].'" width="213" height="146"></a>
		</td>
	</tr><tr>
		<td align="center"><a href="'.$blockA[link].'" title="'.$blockA[caption].'">
			'.$blockA[caption].'</a></td>
 		<td align="center"><a href="'.$blockB[link].'" title="'.$blockB[caption].'">
 			'.$blockB[caption].'</a></td>
 		<td align="center"><a href="'.$blockB[link].'" title="'.$blockB[caption].'">
 			'.$blockC[caption].'</a></td>
	</tr>
	</table>
	</fieldset>
	</div>';
}//


function amazonSearch($text)
{
	$search = '<a href="http://www.amazon.com/gp/redirect.html?ie=UTF8&location=http%3A%2F%2Fwww.amazon.com%2Fs%3Fie%
	3DUTF8%26x%3D0%26ref_%3Dnb%5Fsb%5Fnoss%26y%3D0%26field-keywords%3Dcode%2520geass%26url%3Dsearch-alias%253Daps&tag=
	profwebsofben-20&linkCode=ur2&camp=1789&creative=390957" target="_blank" rel="nofollow" title="'.$text.'"
	class="downloadLink">'.$text.'</a>
	<img src="https://www.assoc-amazon.com/e/ir?t=profwebsofben-20&l=ur2&o=1" width="1" height="1" border="0" alt="" 
	style="border:none !important; margin:0px !important;" />';

	return $search;
}


function amazonLink($p) //returns amazon link only
{
	$pCode = $p[code];
	
	return '<a href="http://www.amazon.com/gp/product/'.$pCode.'?ie=UTF8&tag=profwebsofben-20&linkCode=as2
	&camp=1789&creative=390957&creativeASIN='.$pCode.'" title="'.$p[description].'" target="_blank">'.$p[description].'</a>
	<img src="http://www.assoc-amazon.com/e/ir?t=profwebsofben-20&l=as2&o=1&a='.$pCode.'" width="1" 
	height="1" border="0" style="border:none !important; margin:0px !important;"/>';
}
	

function amazonImg($p) //returns amazon image
{
	global $dir;

	$pCode = $p[code];

	return '<a href="http://www.amazon.com/gp/product/'.$pCode.'?ie=UTF8&tag=profwebsofben-20&linkCode=as2
	&camp=1789&creative=390957&creativeASIN='.$pCode.'" target="_blank">
	<img class="crosshair" src="'.$dir.'images/products/'.$pCode.'.jpg" alt="'.$p[description].'"
	title="'.$p[description].'" /></a>
	<img src="http://www.assoc-amazon.com/e/ir?t=profwebsofben-20&l=as2&o=1&a='.$pCode.'" width="1" height="1"
	border="0" style="border:none !important; margin:0px !important;"/>';
}


function amazonProduct($pCode)//returns amazon img & link based on product ID
{
	global $conn;
    mysql_select_db('codegeas_refrain'); 
    
	$selP = 'select * from amazon where code="'.$pCode.'"';
	$resP = mysql_query($selP, $conn) or print(mysql_error());
	
	$p = mysql_fetch_assoc($resP);
	
	return amazonImg($p).'<br>'.amazonLink($p);
}//function


function randomProducts() //shows 3 random products
{
	global $conn;
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
	$numB = (time() + rand()) % $max;
	$numC = (time() / rand()) % $max;
	
	return '<div class="moduleBlack" title="Code Geass Products"><h2>Popular Amazon Products</h2>
	<table width="100%">
	<tr valign="top">
	<td>
		<table cellspacing="0" cellpadding="0">
		<tr valign="top">
			<td width="33%">'.amazonProduct($product[$numA][code]).'</td>
			<td width="33%">'.amazonProduct($product[$numB][code]).'</td>
		 	<td width="33%">'.amazonProduct($product[$numC][code]).'</td>
		</tr>
		</table>
	</td>
	</tr>
	</table></div>';
}//function
 

//process the text and add links
function processText($input)
{
	global $dir;
	
	$cpath = $dir.'characters/';
	$kpath = $dir.'knightmares/';
	$mpath = $dir.'knightmares/models/';
	$apath = $dir.'about/affiliation/';
	
	$linkList = array(//=====[Character links]=====\\
	$cpath.'Anya' => array('Anya', 'Alstreim'),
	$cpath.'Arthur' => array('Arthur'),
	$cpath.'Asahina' => array('Shogo', 'Asahina'),
	$cpath.'Ayame' => array('Ayame', 'Futaba'),
	$cpath.'Bartley' => array('Asprius', 'Bartley'),
	$cpath.'Carares' => array('Carares'),
	$cpath.'Carine' => array('Carine'),
	$cpath.'CC' => array('C.C.', 'CC'),
	$cpath.'Cecile' => array('Cecile', 'Croomey'),
	$cpath.'Charles' => array('Charles', 'Charles', 'emperor'),
	$cpath.'Cornelia' => array('Cornelia'),
	$cpath.'Clovis' => array('Clovis'),
	$cpath.'Darlton' => array('Darlton', 'Andreas'),
	$cpath.'Dorothea' => array('Dorothea', 'Ernst'),
	$cpath.'Diethard' => array('Diethard', 'Ried', 'Lied'),
	$cpath.'Euphemia' => array('Euphemia', 'Euphie', 'Princess Euphie'),
	$cpath.'Eunuchs' => array('eunuchs', 'Eunuchs'),
	$cpath."Genbu" => array('Genbu'),
	$cpath."Gino" => array("Gino", "Weinberg"),
	$cpath."Gaohai" => array("Gaohai"),
	$cpath."Guilford" => array("Guilford", "Gilbert", "G.P. Guilford"),
	$cpath."Guinevere" => array("Guinevere"),
	$cpath."Hinata" => array("Hinata", "Ichijiku"),
	$cpath."Honggu" => array("Honggu"),
	$cpath."Inoue" => array("Inoue"),
	$cpath."Jeremiah" => array("Jeremiah", "Gottwald"),
	$cpath."Kaguya" => array("Sumeragi", "Kaguya"),
	$cpath."Kallen" => array("Kallen", "Stadtfeld", "Kouzuki", "Karen"),
	$cpath."Kewell" => array("Kewell", "Soresi"),
	$cpath."Kanon" => array("Kanon", "Maldini"),
	$cpath."Kirihara" => array("Kirihara", 'Taizo'),
	$cpath."Lohmeyer" => array("Alicia", "Lohmeyer"),
	$cpath."Lelouch" => array("Lelouch", "Lamperouge", "Zero"),
	$cpath."Lloyd" => array("Lloyd", "Asplund"),
	$cpath."Luciano" => array("Luciano", "Bradley"),
	$cpath."Marianne" => array("Marianne",),
	$cpath."Mao" => array("Mao"),
	$cpath."Marika" => array("Marika"),
	$cpath."Milly" => array("Milly", "Ashford"),
	$cpath."Minase" => array("Minase", "Mutsuki"),
	$cpath."Monica" => array("Monica", "Kruchevsky"),
	$cpath."Nagisa" => array("Nagisa", "Chiba"),
	$cpath."Nina" => array("Nina", "Einstein"),
	$cpath."Nonette" => array("Nonette", "Enneagram"),
	$cpath."Nunnally" => array("Nunnally", "Princess Nunnally", "Governor Nunnally"),
	$cpath."Odysseus" => array("Odysseus", "Prince Odysseus"),
	$cpath."Ohgi" => array("Kaname", "Ohgi"),
	$cpath."Rakshata" => array("Shawla", "Rakshata"),
	$cpath."Rivalz" => array("Rivalz", "Leval", "Cardemonde"),
	$cpath."Rolo" => array("Rolo", "Haliburton"),
	$cpath."Senba" => array("Ryoga", "Senba"),
	$cpath."Shirley" => array("Shirley", "Fennette"),
	$cpath."Schneizel" => array("Schneizel", "Prince Schneizel"),
	$cpath."Suzaku" => array("Suzaku", "Kururugi", "Knight of Zero"),
	$cpath."Sayoko" => array("Sayoko", "Shinozaki"),
	$cpath."Tianzi" => array("Tianzi", "Empress", "Jiang", "Lihua"),
	$cpath."Tohdoh" => array("Kyoshiro", "Tohdoh"),
	$cpath."Tamaki" => array("Shinichiro", "Tamaki"),
	$cpath."Urabe" => array("Kosetsu", "Urabe"),
	$cpath."VV" => array("VV", "V.V."),
	$cpath."Villetta" => array("Villetta", "Nu"),
	$cpath."Xianglin" => array("Zhou", "Xianglin"),
	$cpath."Xingke" => array("Li", "Xing-ke", "Xingke"),
	$cpath."Waldstein" => array("Waldstein", "Bismarck", "Knight of One"),
	$cpath."Vergamon" => array("Liliana", "Vergamon"),
	
	//=====[Knightmare links]=====\\	
	$kpath => array("knightmare", "knightmare frame", "knightmare frames"),
	$kpath."#3rd" => array("third generation", "3rd generation"),
	$kpath."#4th" => array("fourth generation", "4th generation"),
	$kpath."#5th" => array("fifth generation", "5th generation"),
	$kpath."#6th" => array("sixth generation", "6th generation"),
	$kpath."#7th" => array("seventh generation", "7th generation"),
	$kpath."#8th" => array("eigth generation", "8th generation"),
	$kpath."#9th" => array("ninth generation", "9th generation"),
	$mpath."air_cavalry.php" => array("Air Cavalry"),
	$mpath."akatsuki.php" => array("Akatsuki"),
	$mpath."albion.php" => array("Albion"),
	$mpath."avalon.php" => array("Avalon"),
	$mpath."bamides.php" => array("Bamides"),
	$mpath."burai.php" => array("Burai"),
	$mpath."caerleon.php" => array("Caerleon"),
	$mpath."conquista.php" => array("Conquista"),
	$mpath."dispatch_trailer.php" => array("Dispatch Trailer"),
	$mpath."flight_enabled.php" => array("Flight Enabled", "Guren Flight"),
	$mpath."frontier.php" => array("Frontier"),
	$mpath."g1.php" => array("G-1", "G1"),
	$mpath."galahad.php" => array("Galahad"),
	$mpath."ganymede.php" => array("Ganymede"),
	$mpath."gareth.php" => array("Gareth"),
	$mpath."guren.php" => array("Guren"),
	$mpath."ikaruga.php" => array("Ikaruga"),
	$mpath."jikisan" => array("Jikisan"),
	$mpath."knightpolice" => array("Knightpolice"),
	$mpath."lancelot.php" => array("Lancelot"),
	$mpath."leungtan" => array("Leungtan"),
	$mpath."logres.php" => array("Logres"),
	$mpath."mordred.php" => array("Mordred"),
	$mpath."mr1.php" => array("MR-1", "MR1"),
	$mpath."panzer_hummel.php" => array("Panzer", "Hummel"),
	$mpath."percival.php" => array("Percival"),
	$mpath."portman.php" => array("Portman"),
	$mpath."raikou.php" => array("Raikou"),
	$mpath."seiten.php" => array("SEITEN", "S.E.I.T.E.N"),
	$mpath."raikou.php" => array("Raikou"),
	$mpath."shenhu.php" => array("Shen Hu", "shenhu"),
	$mpath."shinkirou.php" => array("Shinkirou"),
	$mpath."siegfried.php" => array("Siegfried"),
	$mpath."submarine.php" => array("Submarine"),
	$mpath."sutherland.php" => array("Sutherland"),						
	$mpath."tristan.php" => array("Tristan"),
	$mpath."vincent.php" => array("Vincent"),
	$mpath."vincent_c.php" => array("Commander"),
	$mpath."vincent_w.php" => array("Ward"),	
	$mpath."vtol.php" => array("VTOL"),	
	$mpath."zangetsu.php" => array("Zangetsu"),	
	
	//=====[Organization links=====\
	$apath.'BlackKnights' => array('black knights', 'Black Knights'),
	$apath.'Area11' => array('Area 11', 'Japan'),
	$apath.'GeassOrder' => array('Geass Order'),									
	$apath.'#AshfordAcademy' => array('Ashford Academy'),
	$apath.'#Britannia' => array('Britannia',),
	$apath.'#ChineseUnion' => array('Chinese Union'),
	$apath."#EuropeanUnion" => array("European Union"),					
	$apath."#ImperialFamily" => array("Imperial Family"),		
	$apath."#JLF" => array("JLF", "Liberation Front"),						
	$apath."#KnightOfRound" => array("KoR", "Knight of Rounds"),						
	$apath."#Kyoto" => array("Kyoto", 'Kyoto House'),		
	$apath."#UFN" => array('UFN', "United Ferederation of Nations"),	
		
	//=====[Season links]=====\\
	$dir.'season_1.php' => array('season 1', 'R1'),
	$dir.'season_2.php' => array('season 2', 'R2'),
	$dir.'season_2.php' => array('season 3', 'R3'),
				
	//=====[Misc. links]=====\\
	$dir.'forum' => array('forum', 'forums', 'community', 'knights'),
	$dir.'index.php' => array('Code Geass', 'code geass', 'refrain'),
	$dir.'about/manga.php' => array('manga'),
	);

	foreach($linkList as $link => $key)
	{
		//different cases, such as where the text appears next to a period or comma
		foreach($key as $link_text)
		{
			//text_
			$input = str_replace($link_text.' ', "<a href='".$link."' title = \"$link_text\"><u>$link_text</u></a> ", $input);
		
			//_text_
			$input = str_replace(' '.$link_text.' ', " <a href='".$link."' title = \"$link_text\"><u>$link_text</u></a> ", $input);
		
			//_text,_
			$input = str_replace(' '.$link_text.', ', " <a href='".$link."' title = \"$link_text\"><u>$link_text</u></a>, ", $input);

			//_text
			$input = str_replace(' '.$link_text, " <a href='".$link."' title = \"$link_text\"><u>$link_text</u></a>", $input);
			
			//_text.
			$input = str_replace(' '.$link_text.'.', " <a href='".$link."' title = \"$link_text\"><u>$link_text</u></a>.", $input);

			//_text._
			$input = str_replace(' '.$link_text.'. ', " <a href='".$link."' title = \"$link_text\"><u>$link_text</u></a>. ", $input);
			
			//_text's_
			$input = str_replace(' '.$link_text."'s ", " <a href='".$link."' title = \"$link_text\"><u>$link_text</u></a>'s ", $input);
		}//foreach
	}//foreach

	return $input;
}//function			


?>