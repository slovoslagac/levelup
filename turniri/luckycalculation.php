<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 16.10.2017
 * Time: 12:37
 */


$calculationtype;
$currentdrawid;
$listoftmpnum = array();
$listofnum = array();
$item_won = array();
$numcomp = 35;


$tmpdate = new DateTime();
$realdate = new DateTime();
if (date_format($tmpdate, "H") > 13) {
    $realdate->setTime(20, 59, 00);
    $calculationtype = 2;
} else {
    $realdate->setTime(11, 59, 00);
    $calculationtype = 1;
}


$newlucky = new luckydraw();
$lastlucky = $newlucky->getlastdrawdetailed();
$newcomputer = new computer();


if (!empty($lastlucky) and $lastlucky->date == date_format($tmpdate, 'Y-m-d') and $lastlucky->type == $calculationtype) {
    $currentdrawid = $lastlucky->id;
    for ($i = 1; $i <= 5; $i++) {
        $currentnum = "n$i";
        array_push($listofnum, $lastlucky->$currentnum);
    }
} else {

    $i = 0;
    while ($i < 5) {
        $tmpnum = mt_rand(1, $numcomp);
        if (in_array($tmpnum, $listoftmpnum)) {

        } else {
            array_push($listoftmpnum, $tmpnum);
            $i++;
        }
    }
    $newlucky->setval($listoftmpnum[0], $listoftmpnum[1], $listoftmpnum[2], $listoftmpnum[3], $listoftmpnum[4], $calculationtype);
    $newlucky->adddraw();
    $newluckydraw = $newlucky->getlastdraw();
    $currentdrawid = $newluckydraw->id;


    foreach ($listoftmpnum as $item) {
        array_push($listofnum, $item);
    }
}


