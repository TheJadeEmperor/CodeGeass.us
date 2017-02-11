<? session_start();?>

<html><head>
<title>Preview Message</title>
</head>
<body>
<center><input type = button value = 'Close' onclick = 'window.close()'/></center>
<?php

echo $_SESSION[message];

?>
<center><input type = button value = 'Close' onclick = 'window.close()'/></center>
</body>
</html>