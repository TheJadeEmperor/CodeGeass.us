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
require_once( 'mod_affiliates.php' );
require_once( 'mod_settings.php' );

// get all affiliates
$affiliates = get_affiliates();

echo get_setting( 'affiliates_template_header' );
foreach( $affiliates as $aff )
   echo parse_affiliates_template( $aff['affiliateid'] );
echo get_setting( 'affiliates_template_footer' );
?>