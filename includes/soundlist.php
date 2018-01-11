<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 11.1.2018
 * Time: 11:51
 */

$dir = ('../sound/');
$files = scandir($dir);
$soundarray = array();

foreach($files as $item){
    if ($item != '.' && $item != '..') {
        array_push($soundarray, $item);
    }
}

echo json_encode($soundarray);