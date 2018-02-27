<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 27.2.2018
 * Time: 14:01
 */
class apiTournament
{
    public function getTournamentById($id) {
        global $conn_cmp;
        $sql=$conn_cmp->prepare("select t.name as tournamentname, tournamentgame as game, platform as platform, date_format(t.tournamenttime, '%d.%c.%Y. %H:%i') as starttime from tournaments t where id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
        return $result;
    }
}