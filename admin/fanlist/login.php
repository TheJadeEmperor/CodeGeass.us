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
session_start();
require_once( 'logincheck.inc.php' );
require_once( 'config.php' );

if( !isset( $_POST['login_password'] ) || $_POST['login_password'] == '' ) {
   $_SESSION['message'] = 'You must enter your password in order to log in.';
   header( 'location: index.php' );
   die( 'Redirecting you...' );
}

$remember = 'no';
if( isset( $_POST['rememberme'] ) && $_POST['rememberme'] == 'yes' )
   $remember = 'yes';

if( login( $_POST['login_password'], $remember ) ) {
   $direct = 'dashboard.php';
   if( isset( $_POST['next'] ) && $_POST['next'] != '' )
      $direct = $_POST['next'];
   header( 'location: ' . $direct );
   die( 'Redirecting you...' );
} else {
   $_SESSION['message'] = 'Your password does not match your previously-' .
      'set password. Please try again.';
   header( 'location: index.php' );
   die( 'Redirecting you...' );
}
?>