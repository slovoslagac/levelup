<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 2.3.2018
 * Time: 13:18
 */
class apiPlayer
{
    public $name;
    public $phone;
    public $email;
    public $status = 0;
    public $password;
    public $passhash;
    public $borndate = null;

    public function setAttribute($atr, $value){
        $this->$atr = $value;
    }

    public function addPlayer (){
        if(self::getPlayer() == ""){
            try {
                self::insertPlayer();
                logAction('Upis novog igraca', "Uspesno je upisan novi igrac $this->name, $this->email", "cmp_player.txt");
            } catch(Exception $e) {
                logAction('Upis novog igraca', "Puca upis $e || $this->name, $this->email", "cmp_player_error.txt");
            }
        } else {
            logAction('Upis novog igraca', "Igrac vec postoji  || $this->name, $this->email", "cmp_player.txt");
        }
    }

    public function getPlayer () {
        global $conn_cmp;
        $sql= $conn_cmp->prepare("select * from players where email = :em");
        $sql->bindParam(":em", $this->email);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function insertPlayer () {
        global $conn_cmp;
        $sql= $conn_cmp->prepare("insert into players (name, phone, email, status, password, passhash, born) values (:nm, :ph, :em, :st, :pw, :pwh, :br)");
        $sql->bindParam(":nm",$this->name);
        $sql->bindParam(":ph",$this->phone);
        $sql->bindParam(":em",$this->email);
        $sql->bindParam(":st",$this->status);
        $sql->bindParam(":pw",$this->password);
        $sql->bindParam(":pwh",$this->passhash);
        $sql->bindParam(":br",$this->borndate);
        $sql->execute();
    }
}