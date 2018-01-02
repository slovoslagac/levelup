<?php

/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 2.1.2018
 * Time: 21:49
 */
class computer
{
    private $number;
    private $status;

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getlive(){
        global $conn_old;
        $sql = $conn_old->prepare("select * from livedetails where ComputerId = :nm");
        $sql->bindParam(":nm", $this->number);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function getminutes() {
        global $conn_old;
        $sql = $conn_old->prepare("select * from statisticsmain where ComputerId = :nm order by id desc limit 1");
        $sql->bindParam(":nm", $this->number);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
        ($result->TotalMinutes > 59)? $this->status = true : $this->status = false;
    }

    public function checkstatus($number){
        $this->number = $number;
        $currentobject = self::getlive();
        (isset($currentobject))? self::getminutes(): "";
        return $this->status;
    }
}