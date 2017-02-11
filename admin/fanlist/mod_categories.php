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


/*___________________________________________________________________________*/
function get_categories( $search = '', $start = 'none' ) {
   require 'config.php';
   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );

   $query = "SELECT * FROM `$db_category` ORDER BY `catname`";

   if( $search )
      $query = "SELECT * FROM `$db_category` WHERE `catname` LIKE '%" .
         $search . "%' ORDER BY `catname`";

   if( $start != 'none' && ctype_digit( $start ) ) {
      $settingq = "SELECT `value` FROM `$db_settings` " .
         "WHERE `setting` = 'per_page'";
      $result = mysql_query( $settingq );
      $row = mysql_fetch_array( $result );
      $limit = $row['value'];
      $query .= " LIMIT $start, $limit";
   }

   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   $cats = array();
   while( $row = mysql_fetch_array( $result ) )
      $cats[] = $row;

   // get children, if there is a search
   $finalcats = $cats;
   if( $search ) {
      foreach( $cats as $cat ) {
         $finalcats = array_merge( $finalcats,
            get_enth_category_children( $cat['catid'] ) );
      }
   }
   return $finalcats;
}

/*___________________________________________________________________________*/
function add_category( $cat, $parent = 0 ) {
   require 'config.php';
   $query = "INSERT INTO `$db_category` ( `catid`, `catname`, `parent` ) " .
      "VALUES( null, '$cat', '$parent' )";
   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   return $result;
}


/*___________________________________________________________________________*/
function get_category_name( $id ) {
   require 'config.php';
   $query = "SELECT `catname` FROM `$db_category` WHERE `catid` = '$id'";
   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   $row = mysql_fetch_array( $result );
   return $row['catname'];
}


/*___________________________________________________________________________*/
function delete_category( $id ) {
   require 'config.php';
   $query = "DELETE FROM `$db_category` WHERE `catid` = '$id'";
   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   return $result;
}


/*___________________________________________________________________________*/
function edit_category( $id, $catname, $parent ) {
   require 'config.php';
   $query = "UPDATE `$db_category` SET `catname` = '$catname'";
   if( $parent )
      $query .= ", `parent` = '$parent' ";
   else
      $query .= ", `parent` = 0 ";
   $query .= "WHERE `catid` = '$id'";
   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   return $result;
}

/*___________________________________________________________________________*/
function get_enth_category_children( $id ) {
   require 'config.php';
   if( !is_numeric( $id ) )
      return array(); // return empty array in case id is not actual id
   $query = "SELECT * FROM `$db_category` WHERE `parent` = '$id'";
   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   $cats = array();
   while( $row = mysql_fetch_array( $result ) )
      $cats[] = $row;
   return $cats;
}

/*___________________________________________________________________________*/
function get_category_parent( $id ) {
   require 'config.php';
   $query = "SELECT `parent` FROM `$db_category` WHERE `catid` = '$id'";
   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   if( $row = mysql_fetch_array( $result ) )
      return $row['parent'];
   else
      return 0;
}


/*___________________________________________________________________________*/
function get_ancestors( $id ) {
   require 'config.php';
   $db_link = mysql_connect( $db_server, $db_user, $db_password )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );
   mysql_select_db( $db_database )
      or die( DATABASE_CONNECT_ERROR . mysql_error() );

   $family = array();
   $family[] = $id;
   $query = "SELECT `parent` FROM `$db_category` WHERE `catid` = '$id'";
   $result = mysql_query( $query );
   if( !$result ) {
      log_error( __FILE__ . ':' . __LINE__,
         'Error executing query: <i>' . mysql_error() .
         '</i>; Query is: <code>' . $query . '</code>' );
      die( STANDARD_ERROR );
   }
   $row = mysql_fetch_array( $result ); $i = 0;
   while( $row['parent'] != 0 && $row['parent'] != '' ) {
      $family[] = $row['parent'];
      $query = "SELECT `parent` FROM `$db_category` WHERE `catid` = '" .
         $row['parent'] . '\'';
      $result = mysql_query( $query );
      if( !$result ) {
         log_error( __FILE__ . ':' . __LINE__,
            'Error executing query: <i>' . mysql_error() .
            '</i>; Query is: <code>' . $query . '</code>' );
         die( STANDARD_ERROR );
      }
      $row = mysql_fetch_array( $result );
   }
   return $family;
}


/*___________________________________________________________________________*/
function category_array_compare( $one, $two ) {
   if( $one['text'] == $two['text'] )
      return 0;
   return( $one['text'] < $two['text'] ) ? -1 : 1;
}

?>