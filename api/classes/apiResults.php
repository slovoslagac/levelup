<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 26.2.2018
 * Time: 15:31
 */
class apiResults
{
    private $matchid;
    private $position;
    private $killnumber;
    private $roundid;

    public function __construct($matchid, $position, $killnumber, $roundid)
    {
        $this->matchid = $matchid;
        $this->position = $position;
        $this->killnumber = $killnumber;
        $this->roundid = $roundid;
    }

    public function addResult (){
        $tmpval = self::getResult();
        if($tmpval == '') {
            self::insertResult();
        }
    }

    public function insertResult(){
        global $conn_cmp;
        $sql= $conn_cmp->prepare('insert into results (matchid ,val1 ,val2 ,roundid) VALUES (:mid, :pos, :kil ,:round)');
        $sql->bindParam(":mid", $this->matchid);
        $sql->bindParam(":pos", $this->position);
        $sql->bindParam(":kil", $this->killnumber);
        $sql->bindParam(":round", $this->roundid);
        $sql->execute();
    }

    public function getResult () {
        global $conn_cmp;
        $sql = $conn_cmp->prepare('select * from results where matchid = :mid and roundid = :rid');
        $sql->bindParam(":mid", $this->matchid);
        $sql->bindParam(":rid", $this->roundid);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

}