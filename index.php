<?php
/**
 * Created by PhpStorm.
 * User: Mozh
 * Date: 15-08-2017
 * Time: 11:37
 */

require_once( "classes/ConfigScan.php" );
require_once( "classes/Config.php" );
require_once( "classes/MConfig.php" );
require_once( "classes/PConfig.php" );
require_once( "classes/dbFunc.php" );

$scan = new ConfigScan('sites');
$scan->findConfig();