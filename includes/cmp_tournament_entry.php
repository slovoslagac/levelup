<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 29.11.2017
 * Time: 13:10
 */
class cmp_tournament_entry
{
    private $playerid = null;
    private $teamid = null;
    private $tournamentid = null;
    private $status = 0;
    private $numberplayerentery = 0;

    public function setattribute($attr, $val)
    {
        $this->$attr = $val;
    }

    public function addtournamententry()
    {
        global $conn_cmp;
        $sql = $conn_cmp->prepare("insert into tournament_entry(playerid, teamid, tournamentid, entrynumber, status) values (:pid, :tid, :trnm, :st, 0)");
        $sql->bindParam(":pid", $this->playerid);
        $sql->bindParam(":tid", $this->teamid);
        $sql->bindParam(":trnm", $this->tournamentid);
        $sql->bindParam(":st", $this->numberplayerentery);
        $sql->execute();

    }

    public function getnumberofplayerenterys()
    {
        global $conn_cmp;
        $sql = $conn_cmp->prepare("select count(*) value
from tournament_entry where tournamentid = :tid and playerid = :pid
group by tournamentid, playerid");
        $sql->bindParam(":tid", $this->tournamentid);
        $sql->bindParam(":pid", $this->playerid);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
        ($result != '')? $this->numberplayerentery = $result->value : $this->numberplayerentery = 0;
    }

    public function getplayerstatus(){
        self::getnumberofplayerenterys();
        return $this->numberplayerentery;
    }


}