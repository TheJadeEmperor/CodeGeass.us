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
    <img src="<?=$dir?>images/menu/zomg.jpg" alt="Nina Einstein" title="Nina Einstein" /> 
    </td>
</tr>
</table>

</div>
<p>&nbsp;</p>

<meta http-equiv="refresh" content="6; ./" />
<?
include($dir.'include/bottom.php'); ?>