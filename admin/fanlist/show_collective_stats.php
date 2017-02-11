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
require 'config.php';

require_once( 'mod_errorlogs.php' );
require_once( 'mod_categories.php' );
require_once( 'mod_joined.php' );
require_once( 'mod_owned.php' );
require_once( 'mod_affiliates.php' );
require_once( 'mod_settings.php' );

$all_owned = get_owned( 'current', 'none', 'bydate' );
$all_joined = get_joined( 'approved', 'none', 'id' );

// total number categories (regardless of if there are stuff inside)
$total_cats = count( get_categories() );

// number of joined listings (pending)
$joined_pending = count( get_joined( 'pending' ) );

// number of joined listings (approved)
$joined_approved = count( get_joined( 'approved' ) );

// number of joined listings (pending+approved)
$joined = $joined_pending + $joined_approved;

// number of owned listings (pending)
$owned_pending = count( get_owned( 'pending' ) );

// number of owned listings (upcoming)
$owned_upcoming = count( get_owned( 'upcoming' ) );

// number of owned listings (current)
$owned_current = count( get_owned( 'current' ) );

// number of owned listings (pending+upcoming+current)
$owned = $owned_pending + $owned_upcoming + $owned_current;

// number of collective affiliates
$affiliates_collective = count( get_affiliates() );

// newest owned fanlisting (current)
if( count( $all_owned ) > 0 )
   $owned_newest = get_listing_info( $all_owned[0] );
else
   $owned_newest = array();

// random owned fanlisting (current)
$index = rand( 0, count( $all_owned ) - 1 );
if( count( $all_owned ) > 0 )
   $owned_random = get_listing_info( $all_owned[$index] );
else
   $owned_random = array();

// newest joined fanlisting (current)
if( count( $all_joined ) > 0 )
   $joined_newest = get_joined_info( $all_joined[0] );
else
   $joined_newest = array();

// random joined fanlisting (current)
$index = rand( 0, count( $all_joined ) - 1 );
if( count( $all_joined ) > 0 )
   $joined_random = get_joined_info( $all_joined[$index] );
else
   $joined_random = array();

// collective total fans (approved)
$collective_total_fans_approved = 0;
$ownedarray = get_owned( 'current' );
$query = '';
foreach( $ownedarray as $o ) {
   $info = get_listing_info( $o );
   $table = $info['dbtable'];
   $dbserver = $info['dbserver'];
   $dbdatabase = $info['dbdatabase'];
   $dbuser = $info['dbuser'];
   $dbpassword = $info['dbpassword'];

   if( $dbserver != $db_server || $dbdatabase != $db_database ||
      $dbuser != $db_user || $dbpassword != $db_password ) {
      // if not on same database, get counts NOW except if it can't be accessed; if not, skip this one
      $db_link = mysql_connect( $dbserver, $dbuser, $dbpassword );
	  if( $db_link === false )
	  	continue; // if it can't be accessed; if not, skip this one
      $connected = mysql_select_db( $dbdatabase );
      if( !$connected )
         continue; // if it can't be accessed; if not, skip this one
      $thisone = "SELECT COUNT(*) AS `total` FROM `$table` WHERE " .
         '`pending` = 0';
      $result = mysql_query( $thisone );
      if( !$result ) {
         log_error( __FILE__ . ':' . __LINE__,
            'Error executing query: <i>' . mysql_error() .
            '</i>; Query is: <code>' . $query . '</code>' );
         die( STANDARD_ERROR );
      }
      $row = mysql_fetch_array( $result );
      $collective_total_fans_approved += $row['total'];
   } else {
      $query .= "SELECT COUNT(*) AS `rowcount` FROM `$table` WHERE " .
         '`pending` = 0';
      $query .= " !!! ";
   }
}
$query = rtrim( $query, "! " );
$query = str_replace( '!!!', 'UNION ALL', $query );

$db_link = mysql_connect( $db_server, $db_user, $db_password )
   or die( DATABASE_CONNECT_ERROR . mysql_error() );
mysql_select_db( $db_database )
   or die( DATABASE_CONNECT_ERROR . mysql_error() );
if( $query != '' ) { // if there IS a query
   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   while( $row = mysql_fetch_array( $result ) ) {
      $collective_total_fans_approved += $row['rowcount'];
   }
}

// collective total fans (pending)
$collective_total_fans = 0;
$ownedarray = get_owned( 'current' );
$query = '';
foreach( $ownedarray as $o ) {
   $info = get_listing_info( $o );
   $table = $info['dbtable'];
   $dbserver = $info['dbserver'];
   $dbdatabase = $info['dbdatabase'];
   $dbuser = $info['dbuser'];
   $dbpassword = $info['dbpassword'];

   if( $dbserver != $db_server || $dbdatabase != $db_database ||
      $dbuser != $db_user || $dbpassword != $db_password ) {
      // if not on same database, get counts NOW
      $db_link = mysql_connect( $dbserver, $dbuser, $dbpassword );
	  if( $db_link === false )
	  	continue; // if it can't be accessed; if not, skip this one
      $connected = mysql_select_db( $dbdatabase );
      if( !$connected )
         continue; // if it can't be accessed; if not, skip this one
      $thisone = "SELECT COUNT(`email`) AS `total` FROM `$table`";
      $result = mysql_query( $thisone );
      if( !$result ) {
         log_error( __FILE__ . ':' . __LINE__,
            'Error executing query: <i>' . mysql_error() .
            '</i>; Query is: <code>' . $query . '</code>' );
         die( STANDARD_ERROR );
      }
      $row = mysql_fetch_array( $result );
      $collective_total_fans += $row['total'];
   } else {
      $query .= "SELECT COUNT(`email`) AS `rowcount` FROM `$table`";
      $query .= " !!! ";
   }
}
$query = rtrim( $query, '! ' ); //echo $query;
$query = str_replace( '!!!', 'UNION ALL', $query );

$db_link = mysql_connect( $db_server, $db_user, $db_password )
   or die( DATABASE_CONNECT_ERROR . mysql_error() );
mysql_select_db( $db_database )
   or die( DATABASE_CONNECT_ERROR . mysql_error() );

if( $query != '' ) {
   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   while( $row = mysql_fetch_array( $result ) ) {
      $collective_total_fans += $row['rowcount'];
   }
}

// collective total fans (pending)
$collective_total_fans_pending = $collective_total_fans -
   $collective_total_fans_approved;

// owned growth rate (current + upcoming)
// get the earliest opened owned listing
$query = "SELECT YEAR( `opened` ) AS `year`, MONTH( `opened` ) AS `month`, " .
   "DAYOFMONTH( `opened` ) AS `day` FROM `$db_owned` WHERE " .
   "`status` != 0 AND `opened` != '0000-00-00' ORDER BY `opened` ASC LIMIT 1";
$result = mysql_query( $query );
if( !$result ) {
   log_error( __FILE__ . ':' . __LINE__,
      'Error executing query: <i>' . mysql_error() .
      '</i>; Query is: <code>' . $query . '</code>' );
   die( STANDARD_ERROR );
}
$row = mysql_fetch_array( $result );
$owned_growth_rate = 0;
$days = 1;
if( $row && count( $row ) > 0 ) {
   $firstyear = $row['year'];
   $firstmonth = $row['month'];
   $firstday = $row['day'];
   $today = getdate();
   $first = getdate( mktime( 0, 0, 0, $firstmonth, $firstday, $firstyear ) );
   $seconds = $today[0] - $first[0];
   $days = round( $seconds / 86400 );
   if( $days == 0 )
      $days = 1;
   $owned_growth_rate = round(($owned_upcoming + $owned_current) / $days, 2);
}

// collective (fans) growth rate (current/approved)
$collective_fans_growth_rate = round( $collective_total_fans_approved / $days,
   2);


// joined growth rate
$query = "SELECT YEAR( `added` ) AS `year`, MONTH( `added` ) AS `month`, " .
   "DAYOFMONTH( `added` ) AS `day` FROM `$db_joined` WHERE " .
   "`added` != '0000-00-00' ORDER BY `added` ASC LIMIT 1";
$result = mysql_query( $query );
if( !$result ) {
   log_error( __FILE__ . ':' . __LINE__,
      'Error executing query: <i>' . mysql_error() .
      '</i>; Query is: <code>' . $query . '</code>' );
   die( STANDARD_ERROR );
}
$row = mysql_fetch_array( $result );
$joined_growth_rate = 0;
$days = 1;
if( $row && count( $row ) > 0 ) {
   $firstyear = $row['year'];
   $firstmonth = $row['month'];
   $firstday = $row['day'];
   $first = getdate( mktime( 0, 0, 0, $firstmonth, $firstday, $firstyear ) );
   $seconds = $today[0] - $first[0];
   $days = round( $seconds / 86400 );
   if( $days == 0 )
      $days = 1;
   $joined_growth_rate = round( $joined / $days, 2);
}
?>