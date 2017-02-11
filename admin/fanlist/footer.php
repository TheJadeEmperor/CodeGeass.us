<?php
/*****************************************************************************
 Enthusiast: Listing Collective Management System
 Copyright (c) by Angela Sabas
 http://scripts.indisguise.org/

 This script is made available for free download, use, and modification as
 long as this note remains intact and a link back to
 http://scripts.indisguise.org/ is given. It is hoped that the script
 will be useful, but does not guarantee that it will solve any problem or is
 free from errors of any kind. Users of this script are forbidden to sell or
 distribute the script in whole or in part without written and explicit
 permission from me, and users agree to hold me blameless from any
 liability directly or indirectly arising from the use of this script.

 For more information please view the readme.txt file.
******************************************************************************/
?>
</div></div>

<div class="sidebar">
<?php
if( isset( $logged_in ) && $logged_in ) {
?>
   <a href="joined.php">Joined</a>
   <a href="owned.php">Owned</a>
   <a href="members.php">Members</a>
   <a href="affiliates.php">Affiliates</a>
   <a href="emails.php">Emails</a>
   <a href="categories.php">Categories</a>
<?php
} else {
?>
   <p class="important">
   <?php echo ( isset( $login_message ) ) ? $login_message : '' ?>
   </p>
   <form action="login.php" method="post">
<?php
   if( isset( $_SESSION['next'] ) && $_SESSION['next'] != '' ) {
      echo '<input type="hidden" name="next" value="' . $_SESSION['next'] . '" />';
   }
?>
   <table class="loginbox">
   <tr><td colspan="2"><h1>Password</h1>
	<input type="password" name="login_password" />
	</td></tr>
	<tr><td class="right">
   Remember me?
	</td><td>
	<input type="checkbox" name="rememberme" value="yes" />
	</td></tr>
   <tr><td style="text-align: right;" colspan="2">
   <input type="submit" value="Log in" />
   </td></tr>
   </table>
   </form>
<?php
}
?>
</div>

<div class="footer">
Enthusiast 3 copyright &copy; 2004 - 2005 by Angela Sabas.<br />
<a href="http://indisguise.org/">Indisguise</a> |
<a href="http://scripts.indisguise.org/">Indiscripts</a>
</div>

</body>
</html>