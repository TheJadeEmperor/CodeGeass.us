<?php
$dir = '../';
include($dir.'include/functions.php');
include($dir.'include/config.php');

if($_GET['db'] == 'nus') { //decide which db and ipn to use  
	$conn = $connNUS; //connect to nus db  
	$ipnFile = 'ipnNUS.php'; 
}
else if($_GET['db'] == 'bps') {
	$conn = $connBPS; //connect to bps db
	$ipnFile = 'ipnBPS.php'; 
}

$productID = $_GET['productID'];


//get product from db 
$tableName = 'products';
$opt = array(
	'tableName' => $tableName,
	'cond' => 'WHERE id="'.$productID.'"'
);

$resP = dbSelectQuery($opt);
$prod = $resP->fetch_array(); //print_r($prod);

$paidToEmail = 'robinsonpp@protonmail.com'; //paypal email 
$itemName = $prod['itemName'];
$itemNumber = $prod['itemNumber'];
$itemPrice = $prod['itemPrice'];
$ipnURL = $cancelURL = $_SERVER["SERVER_NAME"].'/order/'.$ipnFile;

if($_GET['debug'] == 1) {
	print_r($prod); 
}
?>
<p>&nbsp;</p>

<center>
<img src="https://www.paypal.com/en_US/i/bnr/horizontal_solution_PPeCheck.gif" border="0" id="orderForm"><br />
<img border="0" src="<?=$dir?>images/splash/transition.gif" width="186" height="42"><br /><br />

<table width="420px" cellpadding="5" style="border: 1px solid black; font-size: 12px;">
<tr>
	<td align="center">
		<font face="verdana">
		<b>** FOR YOUR PROTECTION **</b><br />
	
		You are being transferred to our <img src="<?=$dir?>images/splash/lock.png" border="0" alt="paypal">
		<b>SECURE PAYMENT PAGE</b>
		<br /><br />
		
		<b>** IMPORTANT ** </b><br />
		Remember to click <b>RETURN TO MERCHANT</b> after checkout to receive your 
		download. </font>
	</td>
</tr>
</table>

<p>&nbsp;</p>

<table width="420px" cellpadding="5" style="border: 1px solid black; font-size: 12px;">
<tr>
	<td align="center">
		<font face="verdana"><b>** DOWNLOAD EMAIL **</b><br />Look for your download email in your inbox.</font>
	</td>
</tr>
</table>
</center>

<p>&nbsp;</p>

<center>
	<div style="width: 200px; font-size: 10px; align: center;">
		<font face="verdana">Your sponsor is [<?=$paidToEmail?>]</font>
	</div>
</center>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="paymentform">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="no_shipping" value="1">
	<input type="hidden" name="no_note" value="1">
	<input type="hidden" name="shipping" value="0.00">
	<input type="hidden" name="lc" value="US">
	<input type="hidden" name="bn" value="PP-BuyNowBF">
	<input type="hidden" name="rm" value="2">
	<input type="hidden" name="business" value="<?=$paidToEmail?>">
	<input type="hidden" name="item_name" value="<?=$itemName?>">
	<input type="hidden" name="item_number" value="<?=$itemNumber?>">
	<input type="hidden" name="amount" value="<?=$itemPrice?>">
	<input type="hidden" name="currency_code" value="USD">
	<input type="hidden" name="notify_url" value="<?=$ipnURL?>">
	<input type="hidden" name="return" value="<?=$ipnURL?>">
	<input type="hidden" name="cancel_return" value="<?=$cancelURL?>">

	<!-- Paypal Custom Field	-->
	<input type="hidden" name="custom" value="<?=$affiliateID?>">
</form>				

<script language=javascript>
	setTimeout('redir()', 5000);
	function redir(){
		document.getElementById('paymentform').submit();
}
</script>
<p>&nbsp;</p>