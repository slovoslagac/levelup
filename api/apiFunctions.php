<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 26.2.2018
 * Time: 15:34
 */

function cmp($a, $b)
{
    return strcmp($a->maxposition, $b->maxposition);
}


function getTournamentMatches($tid){
    global $conn_cmp;
    $sql= $conn_cmp->prepare('select m.id as matchid, p1.name as hometeamname, p2.name as visitorteamname, r1.val1 as val1, r1.val2 as val2, r2.val1 as val3, r2.val2 as val4, r3.val1 as val5, r3.val2 as val6
from matches m
left join players p1 on m.homeparticipantid = p1.id
left join players p2 on m.visitorparticipantid = p2.id
left join results r1 on m.id = r1.matchid and r1.roundid = 1
left join results r2 on m.id = r2.matchid and r2.roundid = 2
left join results r3 on m.id = r3.matchid and r3.roundid = 3
where tournamentid = :tid');
    $sql->bindParam(":tid", $tid);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_OBJ);
    return $result;
}