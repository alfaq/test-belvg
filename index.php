<?php
/**
 * Created by PhpStorm.
 * User: Mozh
 * Date: 15-08-2017
 * Time: 11:37
 */
require_once("classes/ConfigScan.php");

$scan = new ConfigScan('sites');
$scan->findConfig();