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
    private $val1;
    private $val2;
    private $roundid;

    public function __construct($matchid, $position, $killnumber, $roundid)
    {
        $this->matchid = $matchid;
        $this->val1 = $position;
        $this->val2 = $killnumber;
        $this->roundid = $roundid;
    }

    public function addResult ($wokerid){
        $tmpval = self::getResult();
        if($tmpval == '') {
            try {
                self::insertResult();
                logAction('Upis novog rezultata', "Uspesno je upisan novi rezultat na mecu $this->matchid ($this->val1, $this->val2) || upis izvrsio radnik  : $wokerid", "cmp_result.txt");
            } catch (Exception $e) {
                logAction('Upis novog rezultata', "Upis nije uspeo $e || $this->matchid ($this->val1, $this->val2) || upis izvrsio radnik  : $wokerid", "cmp_result.txt");
            }
        } elseif ($this->val2 == 0 && $this->val1 == 0) {
            try {
            self::deleteeResult();
                logAction('Brisanje rezultata', "Uspesno je obrisan rezultat  na mecu $this->matchid ($this->val1, $this->val2) || upis izvrsio radnik  : $wokerid", "cmp_result.txt");
            } catch (Exception $e) {
                logAction('Brisanje rezultata', "Brisanje nije uspelo $e || $this->matchid ($this->val1, $this->val2) || upis izvrsio radnik  : $wokerid", "cmp_result.txt");
            }
        } else {
            try {
            self::updateResult();
                logAction('Update rezultata', "Uspesno je azuriran rezultat  na mecu $this->matchid ($this->val1, $this->val2) || upis izvrsio radnik  : $wokerid", "cmp_result.txt");
            } catch (Exception $e) {
                logAction('Bpdate rezultata', "Azuriranje nije uspelo $e || $this->matchid ($this->val1, $this->val2) || upis izvrsio radnik  : $wokerid", "cmp_result.txt");
            }
        }
    }

    public function insertResult(){
        global $conn_cmp;
        $sql= $conn_cmp->prepare('insert into results (matchid ,val1 ,val2 ,roundid) VALUES (:mid, :pos, :kil ,:round)');
        $sql->bindParam(":mid", $this->matchid);
        $sql->bindParam(":pos", $this->val1);
        $sql->bindParam(":kil", $this->val2);
        $sql->bindParam(":round", $this->roundid);
        $sql->execute();
    }

    public function updateResult(){
        global $conn_cmp;
        $sql= $conn_cmp->prepare('update results set val1 = :pos, val2 = :kil where matchid = :mid and roundid = :round');
        $sql->bindParam(":mid", $this->matchid);
        $sql->bindParam(":pos", $this->val1);
        $sql->bindParam(":kil", $this->val2);
        $sql->bindParam(":round", $this->roundid);
        $sql->execute();
    }

    public function deleteeResult(){
        global $conn_cmp;
        $sql= $conn_cmp->prepare('delete from  results where matchid = :mid and roundid = :round');
        $sql->bindParam(":mid", $this->matchid);
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