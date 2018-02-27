<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 26.2.2018
 * Time: 15:33
 */
class Match
{
    public $hometeamid;
    public $visitorteamid;
    public $tournamentid;
    public $hometeamname;
    public $visitorteamname;
    public $entrynumber;
    public $matchid;

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
    public $maxpoints;
    public $killnumber;

    function setChildObjectAttribute($attr, $value)
    {
        $this->$attr = $value;
        self::setmaxpoints();
    }


    function setmaxpoints()
    {
        $points1 = (pubgPoints($this->positionroundone) + $this->killroundone * 2)  * 100 + $this->killroundone;
        $points2 = (pubgPoints($this->positionroundtwo) + $this->killroundtwo * 2)  * 100 + $this->killroundtwo;
        $points3 = (pubgPoints($this->positionroundthree) + $this->killroundthree * 2)  * 100 + $this->killroundthree ;

        $maxvalue = max($points1, $points2, $points3);
        $killnumber = fmod($maxvalue, 100);
        $maxpoints = floor($maxvalue/100);
        $this->maxpoints = $maxpoints;
        $this->killnumber = $killnumber;



    }

    public function returndata()
    {
        return get_object_vars($this);
    }
}