<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 8.2.2018
 * Time: 11:47
 */

include_once('luckycalculation.php');

$finalnumberlist = array();


function checkval($val){
    $listofnames = array(31 => "S1", 32 => "S2", 33 => "S3", 34 => "S4", 35 => "S5");
    global $sonystart;
    if($val > $sonystart){
        return $listofnames[$val];
    } else {
        return $val;
    }
}

foreach ($listofnum as $num) {
    $tmpcomputer = new computer();
    $tmplackydraw = new luckydraw();
    if ($tmpcomputer->checkstatus($num)) {
        array_push($finalnumberlist, array(checkval($num), 1));
        if ($tmplackydraw->getnumberstatus($num, $currentdrawid) == 0) {
//            $tmpcomputer->insertOffer();
            $tmplackydraw->updatestatus($num, $currentdrawid, 1);
            logAction("Dodavanje nove uplate ", "$num, $currentdrawid", 'offers.txt');
            $slackmessage = "Dodato je 3 sata igracu za racunarom $num.";
            sendSlackInfo($slackmessage, $financialChanel);
        }
    } else {
        array_push($finalnumberlist, array(checkval($num), 2));
    }
}

