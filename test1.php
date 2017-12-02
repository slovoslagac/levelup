<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 2.12.2017
 * Time: 19:18
 */

include(join(DIRECTORY_SEPARATOR, array('includes', 'init.php')));


$tmpmatch = new cmp_matches();
var_dump($tmpmatch->getmatch(2, 1));



