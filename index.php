<?php
/**
 * Created by PhpStorm.
 * User: Mozh
 * Date: 15-08-2017
 * Time: 11:37
 */
function p_autoload ($ClassName) {
  include("classes/" . $ClassName . ".php");
}
spl_autoload_register("p_autoload");

//create obj with param - root folder
$scan = new ConfigScan('sites');
$scan->findConfig();//find, insert and show data