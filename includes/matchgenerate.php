<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 2.3.2018
 * Time: 23:10
 */

$teamarray= array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
shuffle($teamarray);
$tournamenet_id = 4;

$group1 = [$teamarray[0],$teamarray[1],$teamarray[2],$teamarray[3]];
$group2 = [$teamarray[4],$teamarray[5],$teamarray[6],$teamarray[7]];
$group3 = [$teamarray[8],$teamarray[9],$teamarray[10],$teamarray[11]];
$group4 = [$teamarray[12],$teamarray[13],$teamarray[14],$teamarray[15]];

print_r($group1);
echo "<br>";
print_r($group2);
echo "<br>";
print_r($group3);
echo "<br>";
print_r($group4);
echo "<br>";