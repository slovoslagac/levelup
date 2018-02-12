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
    private $userid;

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    public function getSessionId(){
        global $conn_old;
        $sql = $conn_old->prepare("select * from financialsessions where UserId = :vl and active = 1");
        $sql->bindParam(":vl", $this->userid);
        $sql->execute();
        $result=$sql->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function insertOffer(){
        global $conn_old;
        $session = self::getSessionId();
        $sql = $conn_old->prepare("insert into financialoffers (UserId, OfferID, SessionID, TransactionID,EmployeeId,TotalPrice, StartDateTime,FixedStart, Paid, DateAdded, LastDateUsed, FirstDateUsed) values (:ui, 1,:si, -1, 37, 0, now(), 0, 1, now(), '1900-01-01 00:00:00', '1900-01-01 00:00:00' )");
        $sql->bindParam(":ui",$this->userid);
        $sql->bindParam(":si",$session->ID);
        $sql->execute();
    }

    public function getlive()
    {
        global $conn_old;
        $sql = $conn_old->prepare("select * from livedetails where ComputerId = :nm");
        $sql->bindParam(":nm", $this->number);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function getminutes()
    {
        global $conn_old;
        $sql = $conn_old->prepare("select * from statisticsmain where ComputerId = :nm order by id desc limit 1");
        $sql->bindParam(":nm", $this->number);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
        self::setUserid($result->UserID);
        ($result->TotalMinutes > 59) ? self::setStatus(true) : self::setStatus(false);
    }

    public function getsony()
    {
        global $conn;

        $sql = $conn->prepare("select TIMESTAMPDIFF(Minute, b.tstamp,now()) current,
case when name like '%3h%' then format(br.numProducts * 180,0) else format(br.numProducts * 60,0) end value
from billsrows br, sellingproducts sp, bills b
where br.sellingproductid = sp.id
and br.billrid = b.id
and sp.typeid = 6
and br.type = :nm
and b.tstamp < now()
order by b.tstamp desc limit 1");
        $sql->bindParam(":nm", $this->number);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
        ($result->current > 59 and $result->current < $result->value) ? self::setStatus(true) : self::setStatus(false);
    }

    public function checkstatus($number)
    {
        global $sonystart;
        if ($number > $sonystart) {
            self::setNumber($number - $sonystart);
            self::getsony();
        } else {
            self::setNumber($number);
            $currentobject = self::getlive();
            (!empty($currentobject)) ? self::getminutes() : self::setStatus(false);
        }

        return $this->status;
    }
}