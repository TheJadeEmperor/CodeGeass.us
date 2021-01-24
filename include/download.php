<? 
$dir = '../';
include($dir.'include/functions.php');
include($dir.'include/config.php');
include($dir.'include/index.php');

echo '<html>
<head>
<link href="'.$dir.'include/main.css" rel="stylesheet" type="text/css">
</head> 
<body>
<a href="'.$links[splashXenoknight][link].'" target="_blank">
<img src="'.$dir.'img/ad/banner.jpg" alt="PeopleString" title="PeopleString"></a>

<p>&nbsp;</p>

<font size="3"><a href="'.$_GET[link].'" title="Download File '.$_GET[link].'">
Click here to download file</a> -  
<a href="'.$_GET[link].'" title="Download File '.$_GET[file].'">'.$_GET[file].'</a></font>

<br><br><input type="button" onclick="window.close()" value="Close Window">
</body></html>' 
?>