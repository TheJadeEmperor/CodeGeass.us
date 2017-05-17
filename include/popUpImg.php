<?php
$dir = '../'; ?>
<html>
<head>
<title>Code Geass Image - <?=$_GET['file'] ?></title>
<link href="<?=$dir?>include/main.css" rel="stylesheet" type="text/css">
</head>
<body>
	<center>
	<div>
		<a href="<?=$dir?>media/music/sound.php" target="_blank">
		<img src="<?=$dir?>images/ad/downloadAnimeVideoA.jpg" alt="Download Anime Videos" 
		class="crosshair" /></a>
	</div>

	<br /><br />

	<a href="#" onClick="window.close();">
		<img src="<?=$dir.$_GET['file']?>" border="1" alt="Code Geass Image" 
		title="Click image to close window" class="crosshair" /></a>
	<br /><br />

	<font size=5><a href="#" onClick="window.close();" title="Click here to close window">Close Window</a>
	</font>
</center>
</body>
</html>