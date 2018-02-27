<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 27.2.2018
 * Time: 15:08
 */

include(join(DIRECTORY_SEPARATOR, array('..','includes', 'initapi.php')));

if(isset($_GET['matchid']) && isset($_GET['roundid']) && isset($_GET['position']) && isset($_GET['killnumber'])) {
    $matchid = $_GET['matchid'];
    $roundid = $_GET['roundid'];
    $position = $_GET['position'];
    $killnumber= $_GET['killnumber'];
    $tmpresult = new apiResults($matchid,$position,$killnumber,$roundid);
    $tmpresult->addResult();
}