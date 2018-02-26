<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 29.12.2017
 * Time: 10:58
 */
class luckydraw
{
    private $num1;
    private $num2;
    private $num3;
    private $num4;
    private $num5;
    private $type;

    public function setval($num1, $num2, $num3, $num4, $num5, $type)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->num3 = $num3;
        $this->num4 = $num4;
        $this->num5 = $num5;
        $this->type = $type;
    }

    public function adddraw()
    {
        global $conn;
        $sql = $conn->prepare('insert into luckydraw (date, type) values (now(), :tp)');
        $sql->bindParam(":tp", $this->type);
        $sql->execute();
        self::adddrawdetails();
    }

    public function adddrawdetails(){
        global $conn;
        $lastdraw = self::getlastdraw();
        for($i=1; $i<6; $i++) {
            $name = 'num'.$i;
            $sql = $conn->prepare('insert into luckydrawdetails (value, position, drawid, status) values ( :n, :p, :id,0)');
            $sql->bindParam(':n', $this->$name);
            $sql->bindParam(":p", $i);
            $sql->bindParam(":id", $lastdraw->id);
            $sql->execute();

        }

    }

    public function getlastdraw() {
        global $conn;
        $sql = $conn->prepare('select *
from luckydraw
order by id desc limit 1');
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function getlastdrawdetailed() {
        global $conn;
        $sql = $conn->prepare('select ld.id, ld.`date`, ld.tstamp, ld.type, ldd.value n1, ldd1.value n2, ldd2.value n3, ldd3.value n4, ldd4.value n5
from luckydraw ld, luckydrawdetails ldd, luckydrawdetails ldd1, luckydrawdetails ldd2, luckydrawdetails ldd3, luckydrawdetails ldd4
where ld.id = ldd.drawid and ldd.position = 1
and ld.id = ldd1.drawid and ldd1.position = 2
and ld.id = ldd2.drawid and ldd2.position = 3
and ld.id = ldd3.drawid and ldd3.position = 4
and ld.id = ldd4.drawid and ldd4.position = 5
order by ld.id desc limit 1');
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function getnumberstatus($num, $drawid){
        global $conn;
        $sql=$conn->prepare('select * from luckydrawdetails where drawid= :di and value = :num');
        $sql->bindParam(":di", $drawid);
        $sql->bindParam(":num", $num);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
        if($result->status == 0 ) {
            return 0;
        } else {
            return 1;
        }

    }

    public function updatestatus($num, $drawid, $status) {
        global $conn;
        $sql=$conn->prepare("update luckydrawdetails set status = :st where drawid= :di and value = :num ");
        $sql->bindParam(":di", $drawid);
        $sql->bindParam(":num", $num);
        $sql->bindParam(":st", $status);
        $sql->execute();

    }



}