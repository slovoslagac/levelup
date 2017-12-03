<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 2.12.2017
 * Time: 17:37
 */

include(join(DIRECTORY_SEPARATOR, array('includes', 'init.php')));
$arrayofmatches = array();
$numofteams = 64;
$matchnumber = 0;
$matchnumberperround = array();
$matchnumberend = array(0);
$round = 1;
$numofrounds = log($numofteams)/ log(2);
$objectarray = array();
$tournament_id = 1;
//$listofparticipants = (164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175, 176, 177, 178, 179, 180, 181, 182, 183, 184, 185, 186, 187, 188, 189, 190, 191, 192, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212, 213, 214, 215);
$listofparticipants = range(12,63);
shuffle($listofparticipants);

//function matchgenerator($numofteams){
for ($i = 1; $i <= $numofteams; $i++) {
//    while ($matchnumber < $numofteams) {
    (array_key_exists($i-1, $listofparticipants))? $participant = $listofparticipants[$i-1] : $participant = null;
    if(fmod($i, 2) == 1){
        $matchnumber ++;
        $arrayofmatches[$matchnumber][0] = $participant;
    } else {
        $arrayofmatches[$matchnumber][1] = $participant;

    }
//    }




}
//print_r($arrayofmatches);

for($y=1;$y<=count($arrayofmatches); $y++){
    $matchnumber = $y;
    $tmpmatch = new cmp_matches();
    $tmpmatch->addattribute('matchid',$matchnumber);
    $tmpmatch->addattribute('tournamentid', $tournament_id);
    $tmpmatch->addattribute('homeparticipantid', $arrayofmatches[$matchnumber][0]);
    $tmpmatch->addattribute('visitorparticipantid', $arrayofmatches[$matchnumber][1]);
    $tmpmatch->addattribute('roundid',$round);
    array_push($objectarray, $tmpmatch);
//    $tmpmatch->addmatch();
    unset($tmpmatch);
}




$matchnumberperround[1] = $matchnumber;
$matchnumberend[1] = $matchnumber;

for($r = 2; $r<= $numofrounds; $r++) {
    $matchnumberperround[$r] = $matchnumberperround[$r-1]/2;
    for ($m=$matchnumberend[$r-2]+1;$m<=$matchnumberend[$r-1]; $m++){
        $matchnumber++;
        $val = $matchnumberend[$r-2] + $m*2;
        $arrayofmatches[$matchnumber][0] = $m;
        $m++;
        $arrayofmatches[$matchnumber][1] = $m;
        $tmpmatch = new cmp_matches();
        $tmpmatch->addattribute('matchid',$matchnumber);
        $tmpmatch->addattribute('tournamentid', $tournament_id);
        $tmpmatch->addattribute('homematchid', $m-1);
        $tmpmatch->addattribute('homematchidtype', 1);
        $tmpmatch->addattribute('visitormatchid', $m);
        $tmpmatch->addattribute('visitormatchidtype', 1);
        $tmpmatch->addattribute('roundid',$r);
        array_push($objectarray, $tmpmatch);
//        $tmpmatch->addmatch();
        unset($tmpmatch);
    }

    $matchnumberend[$r] = $matchnumber;
}


//print_r($arrayofmatches);

//var_dump($objectarray);
//
foreach($objectarray as $item){
    $currentitem = new cmp_matches();
    $currentitem = $item;
    $testobject = $currentitem->getmatch($currentitem->matchid, $currentitem->tournamentid);
    if($testobject == '') {
        $currentitem->addmatch();
    }
//    unset($item);
//    var_dump($item);
//    echo "$currentitem->matchid - $currentitem->tournamentid <br>";

}
echo "bravo!";