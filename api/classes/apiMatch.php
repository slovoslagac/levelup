<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 26.2.2018
 * Time: 15:33
 */
class Match
{
    private $hometeam;
    private $visitorteam;
    private $tournametnid;
    private $hometeamname;
    private $visitorteamname;

    public function setObjectAttribute($attr, $value){
        $this->$attr = $value;
    }
}


class pubgMatch extends Match
{
    private $positionroundone;
    private $killroundone;
    private $positionroundtwo;
    private $killroundtwo;
    private $positionroundthree;
    private $killroundthree;
    public $maxposition;

    function setChildObjectAttribute($attr, $value) {
            $this->$attr = $value;
            self::setmaxposition();
    }

    function setmaxposition(){
        if($this->positionroundone != null and $this->positionroundone > $this->positionroundtwo) {
            if ($this->positionroundone > $this->positionroundthree) {
                $this->maxposition =  $this->positionroundone;
            } else {
                $this->maxposition =  $this->positionroundtwo;
            }
        } else {
            if($this->positionroundtwo != null and $this->positionroundtwo > $this->positionroundthree){
                $this->maxposition =  $this->positionroundtwo;
            } else {
                $this->maxposition = $this->positionroundthree;
            }
        }

    }

    public function returndata(){
        return (get_object_vars($this));
    }
}