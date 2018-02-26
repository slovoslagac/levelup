<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 26.2.2018
 * Time: 15:24
 */

include(join(DIRECTORY_SEPARATOR, array('..','includes', 'init.php')));

$tournament_id = 1;
$allmatches = array();

$currentTournamentMatches = getTournamentMatches($tournament_id);

foreach($currentTournamentMatches as $item) {
    $tmppubgmatch = new pubgMatch();
    $tmppubgmatch->setObjectAttribute('hometeamname', $item->hometeamname);
    $tmppubgmatch->setObjectAttribute('visitorteamname', $item->visitorteamname);
    $tmppubgmatch->setChildObjectAttribute('positionroundone', $item->val1);
    $tmppubgmatch->setChildObjectAttribute('killroundone', $item->val2);
    $tmppubgmatch->setChildObjectAttribute('positionroundtwo', $item->val3);
    $tmppubgmatch->setChildObjectAttribute('killroundtwo', $item->val4);
    $tmppubgmatch->setChildObjectAttribute('positionroundthree', $item->val5);
    $tmppubgmatch->setChildObjectAttribute('killroundthree', $item->val6);
    array_push($allmatches, $tmppubgmatch);
    unset($tmppubgmatch);

}

//print_r($currentTournamentMatches);


usort($allmatches, "cmp");

var_dump($allmatches);