<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 28.12.2017
 * Time: 15:34
 */
class jackpot
{
    private $sum;

    public function getSum()
    {
        return $this->sum;
    }

    public function setSum($sum)
    {
        $this->sum = $sum;
    }

    public function currentSum()
    {
        global $conn_old;
        $sql = $conn_old->prepare("select OfferId id, count(*) sum
from financialoffers
where OfferId in (17,18)
group by OfferId");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function calculateSum()
    {
        $allObjects = self::currentSum();
        $sum = 2000;
        foreach($allObjects as $item) {
            switch($item->id) {
                case 17:
                    $sum += $item->sum * 40;
                    break;
                case 18:
                    $sum += $item->sum * 80;
                    break;
            }

        }

        self::setSum($sum);
    }
}