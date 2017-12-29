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
        $sql = $conn->prepare('insert into luckydraw (date, n1, n2, n3, n4, n5, type) values (now(), :n1, :n2, :n3, :n4, :n5, :tp)');
        $sql->bindParam(":n1", $this->num1);
        $sql->bindParam(":n2", $this->num2);
        $sql->bindParam(":n3", $this->num3);
        $sql->bindParam(":n4", $this->num4);
        $sql->bindParam(":n5", $this->num5);
        $sql->bindParam(":tp", $this->type);
        $sql->execute();
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

}