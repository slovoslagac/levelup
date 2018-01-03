<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 3.1.2018
 * Time: 12:08
 */
include(join(DIRECTORY_SEPARATOR, array('..','includes', 'init.php')));
$newcomputer = new computer();
$tmpcomputerstatus = $newcomputer->checkstatus(30);


var_dump($tmpcomputerstatus);

var_dump($newcomputer->getminutes(30));

var_dump($newcomputer);