<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 2.3.2018
 * Time: 23:10
 */

$newarray = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16);

function createGruopMatches($array)
{

    $teamarray = $array;
    shuffle($teamarray);
    $tournamenet_id = 4;
    $allmatchesByGroup = array();

    for ($groupnum = 0; $groupnum <= 3; $groupnum++) {
        $tmparray = array();
        $team1 = $teamarray[$groupnum * 4 + 0];
        $team2 = $teamarray[$groupnum * 4 + 1];
        $team3 = $teamarray[$groupnum * 4 + 2];
        $team4 = $teamarray[$groupnum * 4 + 3];

        $tmparray = createMatches($team1, $team2, $team3, $team4);
        array_push($allmatchesByGroup, array($tmparray, $groupnum + 1));

    }


    print_r($allmatchesByGroup);
}

function createMatches($t1, $t2, $t3, $t4)
{
    $allMatchsByround = array();
    array_push($allMatchsByround, array($t1, $t2, 1));
    array_push($allMatchsByround, array($t3, $t4, 1));
    array_push($allMatchsByround, array($t1, $t3, 2));
    array_push($allMatchsByround, array($t2, $t4, 2));
    array_push($allMatchsByround, array($t1, $t4, 3));
    array_push($allMatchsByround, array($t2, $t3, 3));

    return $allMatchsByround;
}


createGruopMatches($newarray);