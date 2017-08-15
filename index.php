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

$scan = new ConfigScan('sites');
$scan->findConfig();




/*$table = '<table>
            <tbody><tr>
                <td>Тип</td>
                <td>Имя (host1, host2, etc)</td>
                <td>DB&nbsp;Host</td>
                <td>DB&nbsp;Username</td>
                <td>DB&nbsp;Password</td>
            </tr>
        </tbody></table>';*/