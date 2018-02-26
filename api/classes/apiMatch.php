<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 26.2.2018
 * Time: 15:33
 */
class Match
{
    public $hometeam;
    public $visitorteam;
    public $tournametnid;
    public $hometeamname;
    public $visitorteamname;

    public function setObjectAttribute($attr, $value)
    {
        $this->$attr = $value;
    }
}


class pubgMatch extends Match
{
    public $positionroundone;
    public $killroundone;
    public $positionroundtwo;
    public $killroundtwo;
    public $positionroundthree;
    public $killroundthree;
    public $maxpoints = 0;

    function setChildObjectAttribute($attr, $value)
    {
        $this->$attr = $value;
        self::setmaxpoints();
    }


    function setmaxpoints()
    {
        $points1 = pubgPoints($this->positionroundone) + $this->killroundone * 2 ;
        $points2 = pubgPoints($this->positionroundtwo) + $this->killroundtwo * 2 ;
        $points3 = pubgPoints($this->positionroundthree) + $this->killroundthree * 2 ;
        $tmppoints = max($points1, $points2, $points3);
        $this->maxpoints = $tmppoints;
    }

    public function returndata()
    {
        return get_object_vars($this);
    }
}