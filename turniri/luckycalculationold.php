<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 16.10.2017
 * Time: 12:37
 */
include(join(DIRECTORY_SEPARATOR, array('..','includes', 'init.php')));

$calculationtype;
$listofnames = array(31 => "S1", 32 => "S2", 33 => "S3", 34 => "S4", 35 => "S5");
$listoftmpnum = array();
$listofnum = array();
$item_won = array();
$numcomp = 35;



$tmpdate = new DateTime();
$realdate = new DateTime();
if (date_format($tmpdate, "H") > 13){
    $realdate->setTime(20,59,00);
    $calculationtype = 2;
} else {
    $realdate->setTime(11,59,00);
    $calculationtype = 1;
}


$newlucky = new luckydraw();
$lastlucky = $newlucky->getlastdrawdetailed();
$newcomputer = new computer();

if (!empty($lastlucky) and $lastlucky->date == date_format($tmpdate, 'Y-m-d') and $lastlucky->type == $calculationtype ) {

    $number = $lastlucky->n1; $tmpcomputerstatus = $newcomputer->checkstatus($number); ($tmpcomputerstatus == true) ? array_push($item_won, $number) : "";
    in_array($number, $item_won) ? $class = 1 : $class = 2; ($number > $sonystart) ?  array_push($listofnum, array($listofnames[$number], $class)) :array_push($listofnum, array($number, $class)) ;$number = $lastlucky->n1;
    $number = $lastlucky->n2; $tmpcomputerstatus = $newcomputer->checkstatus($number); ($tmpcomputerstatus == true) ? array_push($item_won, $number) : "";
    in_array($number, $item_won) ? $class = 1 : $class = 2; ($number > $sonystart) ?  array_push($listofnum, array($listofnames[$number], $class)) :array_push($listofnum, array($number, $class)) ;$number = $lastlucky->n1;
    $number = $lastlucky->n3; $tmpcomputerstatus = $newcomputer->checkstatus($number); ($tmpcomputerstatus == true) ? array_push($item_won, $number) : "";
    in_array($number, $item_won) ? $class = 1 : $class = 2; ($number > $sonystart) ?  array_push($listofnum, array($listofnames[$number], $class)) :array_push($listofnum, array($number, $class)) ;$number = $lastlucky->n1;
    $number = $lastlucky->n4; $tmpcomputerstatus = $newcomputer->checkstatus($number); ($tmpcomputerstatus == true) ? array_push($item_won, $number) : "";
    in_array($number, $item_won) ? $class = 1 : $class = 2; ($number > $sonystart) ?  array_push($listofnum, array($listofnames[$number], $class)) :array_push($listofnum, array($number, $class)) ;$number = $lastlucky->n1;
    $number = $lastlucky->n5; $tmpcomputerstatus = $newcomputer->checkstatus($number); ($tmpcomputerstatus == true) ? array_push($item_won, $number) : "";
    in_array($number, $item_won) ? $class = 1 : $class = 2; ($number > $sonystart) ?  array_push($listofnum, array($listofnames[$number], $class)) :array_push($listofnum, array($number, $class)) ;$number = $lastlucky->n1;


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

    $newlucky->setval($listoftmpnum[0],$listoftmpnum[1],$listoftmpnum[2],$listoftmpnum[3],$listoftmpnum[4], $calculationtype);
    $newlucky->adddraw();

    foreach ($listoftmpnum as $item) {
        if ($item > $sonystart) {
            (in_array($item, $item_won)) ? $class = 1 : $class = 2;
            array_push($listofnum, array($listofnames[$item], $class));

        } else {
//            $tmpcomputerstatus = $newcomputer->checkstatus($item); ($tmpcomputerstatus == true) ? array_push($item_won, $item) : "";
            (in_array($item, $item_won)) ? $class = 1 : $class = 2;
            array_push($listofnum, array($item, $class));

        }
    }

}

echo json_encode($listofnum);
